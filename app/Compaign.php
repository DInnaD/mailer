<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compaign extends Model
{
    //
   
//for updating without del id or other main fields, stus 'fillable' equal update agriment
   

    use Selectable, SoftDeletes, Owned;//, Avaliable {

    //     boot as bootOwnedEvents;
    // }
    
    

    protected $primaryKey = 'id_compaign';
    protected $name = 'name_compaign';
    protected $status = 'status_compaign';

    protected $attributes = [
       // 'status' => 10
    ];
    // public function getOwnedFields(){

    //     return 'user_id','created_by';
    // }
    // public static function boot(){

    //     parent::boot();
    //     self::bootOwenedEvents();
    //     parent::observe(new CampaignsObserver());
    // }
    
    protected $fillable = ['name_compaign', 'template_id', 'bunch_id', 'description_compaign', 'report_id', 'created_by'];
   

	public function user(){
		return $this->hasOne(User::class);
	}
	
	///public function preview(){//instaed invertion
 			//return $this->hasOne(Preview::class, 'compaign_id', 'id_compaign');
	//}//r+d

	///////////////////////////////////////////////////
	public function report(){  
 		return $this->belongsTo(Report::class, 'report_id', 'id_report');
	}//d

	public function template(){
 		return $this->belongsTo(Template::class, 'template_id', 'id_template');
	}//d dd
	public function bunch(){
        return $this->belongsTo(Bunch::class, 'bunch_id', 'id_bunch');
    }//d dd
	public function getSubscribersList(){
        return implode(', ', $this->getRecepients());
	}

	public function getRecepients()(){
		return array_column($this->bunch->subscribers, 'email_subscriber');
	}

	 public function send(){
  		\Mail::to(array_merge($this->getRecepients(), $this->getRequiredRecepients()))->send(new OrderShipped($this));
	 }

	 public function getRequiredRecepients(){
	 	return ['sdasd@fadf.fsdf'];
	 }
//	public function getRequiredRecepients(){
		
// 		 foreach ($this->bunch->subscribers as $subscribers) {
            
//             try {
//    // код который может выбросить исключение
   
//         throw new Exception("One")

        
//     \Mail::to('compaign.preview', $send->user(), function($message1) use ($send){
//             $massage1->subject($request->$compaign->name_compaign);
//             $massage->from('danylevskainna@gmail.com');
//             $massage1->to($subscriber->email_subscriber);
//             $massage1->message($template->getMessage($subscriber));
//             $massage1->survey('http://laravel.loc/report/unsubscribe?email='.$subscriber->email_subscriber);
//     //     })->send(new OrderShipped($opder));


//     // ->cc($moreUsers)
//     // ->bcc($evenMoreUsers)
//     // ->later($when, new Send($send));
   
//     }
  
// } catch (Exception $e) {
//     // код который может обработать исключение
//     echo $e->getMessage();
//     $faild === false;
// }

// Report::create([
//             'subject' => $compaign->'name_compaign',
//             'from' => 'danylevskainna@gmail.com',
//             'to' =>  $subscriber->'email_subscriber',            
//             'massage' => $template->'content_template',
//             'survey' => $subsciber->'email_subscriber'
//         ]);

//     }//foreach

// 	}

}
