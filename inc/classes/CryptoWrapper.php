<?php
/**
 * \Elabftw\Elabftw\CryptoWrapper
 *
 * @author Nicolas CARPi <nicolas.carpi@curie.fr>
 * @copyright 2012 Nicolas CARPi
 * @see http://www.elabftw.net Official website
 * @license AGPL-3.0
 * @package elabftw
 * @deprecated now we use defuse/php-encryption
 */
namespace Elabftw\Elabftw;

use \Defuse\Crypto\Crypto as Crypto;

/**
 * Used for decrypting and encrypting passwords
 */
class CryptoWrapper
{
    /**
     * Load the binary secret key from config.php
     *
     * @throws Exception
     * @return string raw binary string
     */
    private function getSecretKey()
    {
        try {
            return Crypto::hexToBin(SECRET_KEY);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function decrypt($ciphertext)
    {
        return Crypto::decrypt(Crypto::hexToBin($ciphertext), $this->getSecretKey());
    }

    public function encrypt($cleartext)
    {
        return Crypto::binToHex(Crypto::encrypt($cleartext, $this->getSecretKey()));
    }
}