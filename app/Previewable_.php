
class preview extends Model
{
    /**
     * Get the compaign that owns the preview.
     */
    public function compaign()
    {
        return $this->belongsTo('App\Compaign');
    }
}

//not inverse as bunch===subsc
$previews = App\Compaign::find(1)->previews()->where('title', 'foo')->first();

//inverse as comp===preview

$preview = App\Preview::find(1);

echo $preview->compaign->title;








//table
previews
  id - integer
  path - string
  previewable_id - integer
  previewable_type - string

//na blade  staff= template, subscriber, compaign
$staff = Staff::find(1);

foreach ($staff->previews as $preview) {
  //
}
//na ownere
$preview = Preview::find(1);

$previewable = $preview->previewable;


class Preview extends Eloquent {

  public function previewable()
  {
    return $this->morphTo();
  }

}

class Template extends Eloquent {

  public function previews()
  {
    return $this->morphMany('Preview', 'previewable');
  }

}
class Subscriber extends Eloquent {

  public function previews()
  {
    return $this->morphMany('Preview', 'previewable');
  }

}

class Compaign extends Eloquent {

  public function previews()
  {
    return $this->morphMany('Preview', 'previewable');
  }

}