<? 

$strIp = "101.44.255.0, 102.44.255.0, 103.44.255.0, 104.44.255.0";
$diapazon = "101.0.0.0~102.0.0.0";

class checkIp
{
    private $strIp = [];
    private $diapazon = "";
    function __construct(string $str ="",string $diapazon = "") {
        $this->strIp = explode(",", trim($str));
        $this->diapazon = explode("~",trim($diapazon));
    }
    public function print(){
        print "<pre>";
        print "строка ip<br>";
        print_r($this->strIp);
        print "-----------------";
        print "строка диапазона ip<br>";
        print_r($this->diapazon);
        print "</pre>";
    }
    public function check(){
        $from = $this->int2ip($this->diapazon[0]);
        $to =$this->int2ip($this->diapazon[1]);

        foreach($this->strIp as $row){
            $ip = $this->int2ip($row);
            if($ip >= $from && $ip <= $to){
                print "ip: ".$row." входит в диапазон: ".implode("~", $this->diapazon)."<br>";
            }else{
                print "ip: ".$row." не входит в диапазон: ".implode("~", $this->diapazon)."<br>";
            }
           
        }

    }
    private function int2ip($ip) {
        $a=explode(".",$ip);
        return $a[0]*256*256*256+$a[1]*256*256+$a[2]*256+$a[3];
    }
}

$ip = new checkIp($strIp,$diapazon);
$ip->print();
$ip->check();


?>