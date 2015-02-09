# InstagramApi

Basic Instagram API access (without access_token).

## Usage

```PHP
$instagramAPI = new InstagramAPI($clientId, $clientSecret);

$arguments = array(
    'count' => 10
);

$results = $instagramAPI->request('users/<user_id>/media/recent', $arguments);
```