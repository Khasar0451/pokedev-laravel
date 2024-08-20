class EncryptCookies extends Middleware
{
/**
* The names of the cookies that should not be encrypted.
*
* @var array
*/
protected $except = [
'favourites'
];
}