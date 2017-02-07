# InstagramAPI

_*Deprecated: Instagram now requires an access_token*_

Basic Instagram API access (without access_token).

## Usage

```PHP
$instagramAPI = new InstagramAPI($clientID, $clientSecret);

$arguments = array(
    'count' => 10
);

$results = $instagramAPI->request('users/<user_id>/media/recent', $arguments);
```
