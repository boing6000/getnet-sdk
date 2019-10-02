use Getnet\API\Environment;
use Getnet\API\Getnet;

/**
 * @return Getnet
 */
function santander_gateway()
{
    $env = Environment::production();
    $SessionKey = 'csf';
    switch (env('GETNET_ENV')) {
        case 'SANDBOX':
            $env = Environment::sandbox();
            break;
        case 'HOMOLOG':
            $env = Environment::homolog();
            break;
        default:
            break;
    }

    try {
        $getnet = new Getnet(
            env('GETNET_ID'),
            env('GETNET_SECRET'),
            $env,
            $SessionKey
        );
        return $getnet;
    } catch (Exception $e) {
        
    }
}
