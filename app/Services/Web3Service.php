<?php

namespace App\Services;

use phpseclib\Math\BigInteger;
use Web3\Web3;
use Web3\Contract;
use Web3\Providers\HttpProvider;
use Web3\Providers\HttpRequestManager;

class Web3Service 
{
  private $web3;
  private $contract;
  private $contractAddress;

  public function __construct()
  {
      $this->web3 = new Web3(new HttpProvider('http://host.docker.internal:7545'));
      
      $contractAbi = json_decode(file_get_contents(base_path('blockchain/contract-artifacts/AmanMemilih.json')), true)['abi'];
      $this->contractAddress = json_decode(file_get_contents(base_path('blockchain/contract-artifacts/contract-address.json')), true)['AmanMemilih'];
      
      $this->contract = new Contract($this->web3->provider, $contractAbi);
  }

  public function uploadDocument($documentC1, $userId)
  {
      $createdAt = (string)time();
      $result = null;
      
      $this->contract->at($this->contractAddress)->send('uploadPresidentialDocument', $documentC1, (string)$userId, $createdAt, [
          'from' => '0xF802Bf589d03f2a1eBF0299a14749a3c55Db40Ca',
          'gas' => '0x6691b7', // 6,700,000 gas (Ganache default block gas limit)
          'gasPrice' => '0x3b9aca00', // 1 Gwei (Ganache default)
          'value' => '0x0' // No ETH value being sent
      ], function ($err, $tx) use (&$result) {
          if ($err !== null) {
              throw new \Exception($err->getMessage());
          }
          $result = $tx;
      });
      
      return $result;
  }

  public function getDocuments()
  {
      $documents = [];
      $isComplete = false;
      
      $this->contract->at($this->contractAddress)->call('getListDocument', function ($err, $result) use (&$documents, &$isComplete) {
          if ($err !== null) {
              throw new \Exception($err->getMessage());
          }
          
          // result contains 5 arrays: [ids, documentC1s, userIds, statuses, createdAts]
          if (is_array($result) && count($result) === 5) {
              $ids = $result[0];
              $documentC1s = $result[1];
              $userIds = $result[2];
              $statuses = $result[3];
              $createdAts = $result[4];
              
              // Combine the arrays into a single array of documents
              for ($i = 0; $i < count($ids); $i++) {
                  $documents[] = [
                      'id' => $ids[$i]->toString(),
                      'documentC1' => $documentC1s[$i],
                      'userId' => $userIds[$i],
                      'status' => $statuses[$i]->toString(),
                      'createdAt' => $createdAts[$i]->toString()
                  ];
              }
          }
          
          $isComplete = true;
      });
      
      // Wait for the callback to complete
      while (!$isComplete) {
          usleep(100000); // Sleep for 100ms
      }
      
      return $documents;
  }
}