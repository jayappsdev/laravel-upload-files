<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;


class UploadFilesTest extends TestCase
{
    public function test_correct_upload(): void
    {
        $file[] = UploadedFile::fake()->create('fake_image.jpg', 1024); 

        $response = $this->post('api/uploadfile', [
            'file' => $file,
        ]);

        $response->assertStatus(200);
    }

    public function test_upload_incorrect_size(): void
    {
        $file[] = UploadedFile::fake()->create('fake_image.jpg', 7024); 

        $response = $this->post('api/uploadfile', [
            'file' => $file,
        ]);

        $response->assertStatus(302);
    }
    
    public function test_upload_incorrect_file_format(): void
    {
        $file[] = UploadedFile::fake()->create('fake_image.svg', 1024); 

        $response = $this->post('api/uploadfile', [
            'file' => $file,
        ]);

        $response->assertStatus(302);
    }

    
    
}
