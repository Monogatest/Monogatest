<?php

namespace App\Jobs;

use File;
use Storage;
use App\Jobs\Job;
use App\Models\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UploadImage extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;
    public $user;
    public $fileId;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, $fileId)
    {
        $this->user = $user;
        $this->fileId = $fileId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $path = storage_path() . '/uploads/' . $this->fileId;
        $fileName = $this->fileId . '.png';
        // Storage::disk('s3images')->put('avatar/' . $fileName, fopen($path, 'r+'));
        if(Storage::disk('s3images')->put('avatar/' . $fileName, fopen($path, 'r+'))){
          File::delete($path);
        }
        $this->user->avatar = $fileName;
        $this->user->save();


    }
}
