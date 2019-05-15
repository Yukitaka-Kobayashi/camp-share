<?php 
return [ 
    'api_key' => env('TWITTER_API_KEY',''),
    'secret_key' => env('TWITTER_SECRET_KEY',''),
    'access_token' => env('TWITTER_ACCESS_TOKEN',''),
    'token_secret' => env('TWITTER_TOKEN_SECRET',''),
	'call_back_url' => env('TWITTER_CALLBACK_URL', '')
];