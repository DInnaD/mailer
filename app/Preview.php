<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preview extends Model
{
    //
    use Selectable, Owned;
    protected $primaryKey = 'id_preview';
  
    
    protected $fillable = ['compaign_id', 'subscriber_id', 'from', 'template_id', 'survey', 'created_by'];

    public function getSubscribersList(){
		$email_subscriber = array_column($this->bunch->subscribers, 'email_subscriber');
        return implode(', ', $email_subscriber);
	}//assoc bunch faild
	public function getCompaignItem(){
		$name_compaign = $this->preview->compaign;
        return $name_compaign;
	}
	public function getTemplateItem(){
		$content_template = $this->template;
        return $content_template;
	}
	public function getFromItem(){
		$email = $this->email;
        return $email;
	}

	// Associations

    public function user(){
		return $this->hasOne(User::class);
	}		

////////////////////d has one to api?????????????????
	
	
   public function compaign(){//es i zacreatelo!!!!!!!!! why not bunch?????????????????
        return $this->belongsTo(Compaign::class, 'compaign_id', 'id_compaign');
    }//d+r
    public function template(){
		return $this->belongsTo(Template::class, 'template_id', 'id_template');
	}//d
    public function subscribers(){
		return $this->belongsTo(Subscriber::class, 'subscriber_id', 'id_subscriber');
	}//d


	// public function send(){
 // 		\Mail::to(array_merge($this->getSubscribersList(), $this->getRequiredRecepients()))->send(new OrderShipped($this));
	// }
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

