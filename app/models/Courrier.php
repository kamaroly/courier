<?php

class Courrier extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'from_area' 	=> 'required|numeric',
		'to_area'	=> 'required|numeric',
		'pickup_date'	=> 'required|date',
		'pickup_time'	=> 'required',
		'type'		=> 'required|alpha_spaces'
	];

	public static $minutes = ['00'=>'00','15'=>'15','30'=>'30','45'=>'45'];

	// Don't forget to fill this array
	protected $fillable = ['from_area','to_area','pickup_time','pickup_date','type','sender_id','receiver_id','tranporter','status','details','price'];


  /** Relation to the courrier route  */
  public function route()
  {   
    return $this->belongsTo('CourrierRoute');
  }
  
  /** Area where this courrier came from */
  public function fromArea()
  {
    return $this->belongsTo('Area','from_area');
  }

  /** Destination area for this courrier */
  public function toArea()
  {
    return $this->belongsTo('Area','to_area');
  }

  /** The person who sent this courrier */
  public function sender()
  {
    return $this->belongsTo('Customer','sender_id');
  }

  /** The Customer who is supposed to receive this courrier */
  public function receiver()
  {
    return $this->belongsTo('Customer','receiver_id');
  }


  /** relationShip to transporters  */
    public function transporterPerson()
    {
      return $this->belongsTo('Transporter','transporter');
    }


   /**
    * Validate route
    */

   public static function validateRoute($from,$to)
   {
   	  return (($from!=0 && $to != 0 ) && ($from!=$to));
   }
   

   /**
    * Get hours in a day
    * 
    * @return array of hours
    */
   public static function getHours()
   {
   	 $hours = [];

   	 for($hour =7;$hour < 20 ;$hour++ )
   	 {
   	 	//check if hour is less than 10 and prefix with 0
   	 	if ($hour <10)
   	 	{
   	 		$hours['0'.$hour]='0'.$hour;
   	 		continue;
   	 	}

   	 	$hours[$hour] = $hour;
   	 }

   	 return $hours;
   }

   /**
    * Function to trigger when create or update
    * @return this
    */
   public static function boot()
    {
        parent::boot();

        // If courrier is create then send an alert
        
        static::creating(function($courrier)
        {
            $email = $courrier->sender->email;

            $subject  = Lang::get('courriers.thank_you');

            $data['names']   = $courrier->sender->names;


            Mail::queue('emails.courriers.CourrierBookingConfirmation', $data, function($message) use($email, $subject)
            {
              $message->to($email)
                      ->subject($subject);
            });

        });

        static::updating(function($courrier)
        {
      
            $email = $courrier->sender->email;

            $subject  = Lang::get('courriers.thank_you');

            $data['names']   = $courrier->sender->names;

	    // if we picked or received the courrier
	    if((int) $courrier->status==3):
	    $subject  = Lang::get('courriers.recieved');
            Mail::queue('emails.courriers.courrierreceived', $data, function($message) use($email, $subject)
            {
              $message->to($email)
                      ->subject($subject);
            });
            elseif((int) $courrier->status==4):
            $subject  = Lang::get('courriers.delivered');
            Mail::queue('emails.courriers.courrierreceived', $data, function($message) use($email, $subject)
            {
              $message->to($email)
                      ->subject($subject);
            });
            endif;
        });
    }


}