<!DOCTYPE>
<?PHP
function create_RSS_feed() {
require('config.php');

// Initial string
$xmlString = '';
$items = '';
$temp = '';
$end = '';

$con = mysqli_connect($db_host,$db_user,$db_pass,$db_name); 

// Check connect 
if (!$con) 
{ 
    die("Could not connect: " . mysqli_connect_error()); 
} 

// Select table.
$query = "SELECT * FROM ".$tb_name3;
$result = mysqli_query($con,$query) or die('Error in query');

if ( ($row_amount = mysqli_num_rows($result)) && ($col_amount = mysqli_num_fields($result)) ) {

// Title Partition
$xmlString= '<?xml version="1.0" encoding="UTF-8"?>
<rss xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" 
xmlns:atom="http://www.w3.org/2005/Atom" 
xmlns:rawvoice="http://www.rawvoice.com/rawvoiceRssModule/" version="2.0">
<channel>
<title>'.$RSS_title.'</title>
<description>'.$description.'</description>
<link>'.$http_path.'</link>
<language>'.$lang.'</language>
<copyright>&#xA9; '.$copy_right.'</copyright>
<itunes:image href="'.$http_path.'images/'.$RSS_icon.'"/>
<itunes:owner>
<itunes:name>'.$RSS_title.'</itunes:name>
<itunes:email>'.$Main_email.'</itunes:email>
</itunes:owner>
<itunes:category text="'.$category.'"/>
<itunes:keywords>
'.$keyword.'
</itunes:keywords>
<itunes:explicit>No</itunes:explicit>';

// Insert every audios/videos information. (Middle Partition)
$i = 1;
$counts = 1;
$items = '';

while ( $counts <= $row_amount ) {
    
    $query = "SELECT * FROM ".$tb_name3." WHERE serial = ".$i;
    $result = mysqli_query($con,$query) or die('Error in query1');
    $data = mysqli_fetch_row($result);
    if ( $data == "" ) {
        $i++;
    } else {

        if ( $data[7] == 1 ) {
            if ( ($data[8] == 1) or ($data[8] == 3) ) {
            $time = strtotime($data[5]);
            $timestr = strftime("%d %B %Y",$time);
            if ( $data[6] == 0 ) {
                $type = 'audio/mpeg';
            } else if ( $data[6] == 1) {
                $type = 'video/mp4';
            }

            $temp = '<item>
            <title>'.$data[1].'</title>
            <description>'.$data[2].'</description>
            <itunes:summary>'.$data[2].'</itunes:summary>
            <itunes:subtitle>'.$data[2].'</itunes:subtitle>
            <enclosure url="'.$data[3].'" type="'.$type.'" length="1"/>
            <guid>'.$data[3].'</guid>
            <itunes:duration>'.$data[4].'</itunes:duration>
            <pubDate>'.$timestr.' 00:00:00 EST</pubDate>
            <itunes:explicit>No</itunes:explicit>
            </item>';
            $items .= $temp;
            }
        }
        $i++;
        $counts++;
    }
}

// End Partition
$end = '<atom:link href="'.$http_path.$RSS_feed_loca.'" rel="self" type="application/rss+xml" />
</channel>
</rss>';

//Append all strings
$xmlString .= $items;
$xmlString .= $end;

$dom = new DOMDocument;
$dom->preserveWhiteSpace = FALSE;
$dom->loadXML($xmlString);

//Save XML as a file
$dom->save($RSS_feed_loca);

}

}

?>