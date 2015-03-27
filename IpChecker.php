<?php
interface iIpChecker
{
    public function __construct($apiKey, $ip);
    public function getIp($ip);
    public function getCity($ip);
    public function getState($ip);
    public function getCountry($ip);
}
class IpChecker implements iIpChecker{
    protected $apiKey = '';
    public function __construct($apiKey, $ip){}
    public function setKey($key){
        $this->apiKey = $key;
    }
    public function getIp($ip) {
        $ip = $this->getResult('ip-city', $ip);
        return $ip->ipAddress;
    }
    public function getCity($ip) {
        $city = $this->getResult('ip-city', $ip);
        return $city->cityName;
    }
    public function getState($ip) {
        $state = $this->getResult('ip-city', $ip);
        return $state->regionName;
    }
    public function getCountry($ip) {
        $country = $this->getResult('ip-country', $ip);
        return $country->countryName;
    }
    private function getResult($name, $ip){
        $url = 'http://api.ipinfodb.com/v3/' . $name . '/?key=' . $this->apiKey . '&ip=' . $ip . '&format=json';
        $result = file_get_contents($url);
        $json = json_decode($result);
        return $json;
    }
}