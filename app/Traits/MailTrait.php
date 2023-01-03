<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Mail;

trait MailTrait
{
   /**
     * Boot function from Laravel.
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }

    public function sendMail($config){
        //print_r($config);
        if($config['bladeName']=='' || $config['bladeName']==null ){
            return '缺少blade';
        }
        Mail::send(
            $config['bladeName'],
            $config['data'],
            function($message) use ($config) { 
                $message->subject( $config['title'] );
    
                if(isset($config['to'])){
                    $message->to($config['to']);
                }
        
                if(isset($config['cc'])){
                    $message->cc($config['cc']);
                }
    
                if(isset($config['bcc'])){
                    $message->bcc($config['bcc']);
                }
    
                if(isset($config['attach'])){
                    foreach($config['attach'] as $attach) {
                        $message->attach($attach['filePath'], [
                            'as' => $attach['fileName'] ?? null,
                        ]);
                    }      
                }
                  
            }
        ); 
    }
}



