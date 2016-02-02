<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
	protected $table = 'flyer_photos';

	protected $fillable = ['path'];

	protected $baseDir = '/flyers/photos';

	protected $file;
    
    public function flyer()
    {
    	return $this->belongsTo('App\Flyer');
    }

    public function fromFile(UploadedFile $file)
    {
    	$photo = new static;

    	$photo->file = $file;

    	return $photo->fill([
    		'name'           => $photo->fileName(),
    		'path'           => $photo->filePath(),
    		'thumbnail_path' => $photo->thumnailPath()
    	]);
    }

    public function filePath()
    {
    	return $this->baseDir() . '/' . $this->fileName();
    }

    public function thumbnailPath()
    {
    	return $this->baseDir() . '/tb-' . $this->fileName();
    }

    public function baseDir()
    {
    	return 'flyers/photos';
    }

    public function upload(UploadedFile $file)
    {
    	$this->file->move($this->baseDir(), $this->fileName());

    	$this->makeThumbnail();

    	return $this;
    }

    protected function makeThumbnail()
    {
    	Image::make($this->filePath())
    		->fit(200)
    		->save($this->thumbnailPath());
    }

    public function fileName()
    {
    	$name = sha1(
    		time() . $this->file->getClientOriginalName();
    	);

    	$extension = $this->file->getClientOriginalExtension();

    	return "{$name}/{$extension}";
    }
}
