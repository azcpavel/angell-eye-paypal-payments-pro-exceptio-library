
<html>
<head>
<title>Angell EYE PayPal Adaptive Payments CodeIgniter Library Demo</title>

<style type="text/css">

body {
 background-color: #fff;
 margin: 40px;
 font-family: Lucida Grande, Verdana, Sans-serif;
 font-size: 14px;
 color: #4F5155;
}

a {
 color: #003399;
 background-color: transparent;
 font-weight: normal;
}

h1 {
 color: #444;
 background-color: transparent;
 border-bottom: 1px solid #D0D0D0;
 font-size: 16px;
 font-weight: bold;
 margin: 24px 0 2px 0;
 padding: 5px 0 6px 0;
}

code {
 font-family: Monaco, Verdana, Sans-serif;
 font-size: 12px;
 background-color: #f9f9f9;
 border: 1px solid #D0D0D0;
 color: #002166;
 display: block;
 margin: 14px 0 14px 0;
 padding: 12px 10px 12px 10px;
}

</style>
</head>
<body>

<p><a href="http://www.angelleye.com"><img src="http://www.angelleye.com/demo/codeigniter/images/logo.jpg" alt="Angell EYE Web Solutions Made Easy" width="500" height="102" border="0"></a></p>
<h1>Angell EYE PayPal PayFlow CodeIgniter Library Demo	</h1>
<p>This library is written to reflect PayPal's documentation directly. It's very simple to use with a quick understanding of the way it's designed.  </p>
The follow sample demonstrates how to work with this library.
<h2>ProcessTransaction</h2>
<p>The PayFlow library really only consists of a single call: ProcessTransaction. All types of transactions can be made using this function. You would simply adjust the values for tender and trxtype accordingly.</p>
<p>The controller file (payflow.php) contains a Process_transaction() function setup with all the possible parameters ready to populate, and it also contains the Process_transaction_demo() function that you see below.</p>
<p>The library will handle generating the API request using these parameters and will return an array of all response data from PayPal. Click the link below to see a sample of what you'll receive. Note that my testing account is returning Fraud Filter warnings. This may or may not happen with your account depending on your Fraud Filter settings in PayPal Manager.</p>
<p><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br /></span><span style="color: #007700">function&nbsp;</span><span style="color: #0000BB">Process_transaction_demo</span><span style="color: #007700">()<br />{<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Prepare&nbsp;request&nbsp;arrays<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$PayPalRequestData&nbsp;</span><span style="color: #007700">=&nbsp;array(<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'tender'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'C'</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Required.&nbsp;&nbsp;The&nbsp;method&nbsp;of&nbsp;payment.&nbsp;&nbsp;Values&nbsp;are:&nbsp;A&nbsp;=&nbsp;ACH,&nbsp;C&nbsp;=&nbsp;Credit&nbsp;Card,&nbsp;D&nbsp;=&nbsp;Pinless&nbsp;Debit,&nbsp;K&nbsp;=&nbsp;Telecheck,&nbsp;P&nbsp;=&nbsp;PayPal<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'trxtype'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'S'</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Required.&nbsp;&nbsp;Indicates&nbsp;the&nbsp;type&nbsp;of&nbsp;transaction&nbsp;to&nbsp;perform.&nbsp;&nbsp;Values&nbsp;are:&nbsp;&nbsp;A&nbsp;=&nbsp;Authorization,&nbsp;B&nbsp;=&nbsp;Balance&nbsp;Inquiry,&nbsp;C&nbsp;=&nbsp;Credit,&nbsp;D&nbsp;=&nbsp;Delayed&nbsp;Capture,&nbsp;F&nbsp;=&nbsp;Voice&nbsp;Authorization,&nbsp;I&nbsp;=&nbsp;Inquiry,&nbsp;L&nbsp;=&nbsp;Data&nbsp;Upload,&nbsp;N&nbsp;=&nbsp;Duplicate&nbsp;Transaction,&nbsp;S&nbsp;=&nbspnbsp;Sale,&nbsp;V&nbsp;=&nbsp;Void<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'acct'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'5555555555554444'</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Required&nbsp;for&nbsp;credit&nbsp;card&nbsp;transaction.&nbsp;&nbsp;Credit&nbsp;card&nbsp;or&nbsp;purchase&nbsp;card&nbsp;number.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'expdate'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'1215'</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Required&nbsp;for&nbsp;credit&nbsp;card&nbsp;transaction.&nbsp;&nbsp;Expiration&nbsp;date&nbsp;of&nbsp;the&nbsp;credit&nbsp;card.&nbsp;&nbsp;Format:&nbsp;&nbsp;MMYY<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'amt'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'10.00'</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbspnbsp;Required.&nbsp;&nbsp;Amount&nbsp;of&nbsp;the&nbsp;transaction.&nbsp;&nbsp;Must&nbsp;have&nbsp;2&nbsp;decimal&nbsp;places.&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'dutyamt'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">''</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'freightamt'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'5.00'</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'taxamt'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'2.50'</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'taxexempt'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">''</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'comment1'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'This&nbsp;is&nbsp;a&nbsp;test!'</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Merchant-defined&nbsp;value&nbsp;for&nbsp;reporting&nbsp;and&nbsp;auditing&nbsp;purposes.&nbsp;&nbsp;128&nbsp;char&nbsp;max<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'comment2'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'This&nbsp;is&nbsp;only&nbsp;a&nbsp;test!'</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Merchant-defined&nbsp;value&nbsp;for&nbsp;reporting&nbsp;and&nbsp;auditing&nbsp;purposes.&nbsp;&nbsp;128&nbsp;char&nbsp;max<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'cvv2'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'123'</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;A&nbsp;code&nbsp;printed&nbsp;on&nbsp;the&nbsp;back&nbsp;of&nbsp;the&nbsp;card&nbsp;(or&nbsp;front&nbsp;for&nbsp;Amex)<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'recurring'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">''</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Identifies&nbsp;the&nbsp;transaction&nbsp;as&nbsp;recurring.&nbsp;&nbsp;One&nbsp;of&nbsp;the&nbsp;following&nbsp;values:&nbsp;&nbsp;Y&nbsp;=&nbsp;transaction&nbsp;is&nbsp;recurring,&nbsp;N&nbsp;=&nbsp;transaction&nbsp;is&nbsp;not&nbsp;recurring.&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'swipe'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">''</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Required&nbsp;for&nbsp;card-present&nbsp;transactions.&nbsp;&nbsp;Used&nbsp;to&nbsp;pass&nbsp;either&nbsp;Track&nbsp;1&nbsp;or&nbsp;Track&nbsp;2,&nbsp;but&nbsp;not&nbsp;both.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'orderid'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">''</span><span style="color: #007700">,&nbsp;&nbsp;&nbspnbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Checks&nbsp;for&nbsp;duplicate&nbsp;order.&nbsp;&nbsp;If&nbsp;you&nbsp;pass&nbsp;orderid&nbsp;in&nbsp;a&nbsp;request&nbsp;and&nbsp;pass&nbsp;it&nbsp;again&nbsp;in&nbsp;the&nbsp;future&nbsp;the&nbsp;response&nbsp;returns&nbsp;DUPLICATE=2&nbsp;along&nbsp;with&nbsp;the&nbsp;orderid<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'billtoemail'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'sandbox@testdomain.com'</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Account&nbsp;holder's&nbsp;email&nbsp;address.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'billtophonenum'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'816-555-5555'</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Account&nbsp;holder's&nbsp;phone&nbsp;number.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'billtofirstname'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'Tester'</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Account&nbsp;holder's&nbsp;first&nbsp;name.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'billtomiddlename'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">''</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Account&nbsp;holder's&nbsp;middle&nbsp;name.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'billtolastname'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'Testerson'</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Account&nbsp;holder's&nbsp;last&nbsp;name.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'billtostreet'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'123&nbsp;Test&nbsp;Ave.'</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;The&nbsp;cardholder's&nbsp;street&nbsp;address&nbsp;(number&nbsp;and&nbsp;street&nbsp;name).&nbsp;&nbsp;150&nbsp;char&nbsp;max<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'billtocity'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'Kansas&nbsp;City'</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Bill&nbsp;to&nbsp;city.&nbsp;&nbsp;45&nbsp;char&nbsp;max<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'billtostate'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'MO'</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Bill&nbsp;to&nbsp;state.&nbsp;&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'billtozip'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'64111'</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Account&nbsp;holder's&nbsp;5&nbsp;to&nbsp;9&nbsp;digit&nbsp;postal&nbsp;code.&nbsp;&nbsp;9&nbsp;char&nbsp;max.&nbsp;&nbsp;No&nbsp;dashes,&nbsp;spaces,&nbsp;or&nbsp;non-numeric&nbsp;characters<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'billtocountry'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'US'</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbnbsp;</span><span style="color: #FF8000">//&nbsp;Bill&nbsp;to&nbsp;Country&nbsp;Code.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'shiptofirstname'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'Tester'</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Ship&nbsp;to&nbsp;first&nbsp;name.&nbsp;&nbsp;30&nbsp;char&nbsp;max<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'shiptomiddlename'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">''</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Ship&nbsp;to&nbsp;middle&nbsp;name.&nbsp;30&nbsp;char&nbsp;max<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'shiptolastname'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'Testerson'</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Ship&nbsp;to&nbsp;last&nbsp;name.&nbsp;&nbsp;30&nbsp;char&nbsp;max<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'shiptostreet'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'123&nbsp;Test&nbsp;Ave.'</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Ship&nbsp;to&nbsp;street&nbsp;address.&nbsp;&nbsp;150&nbsp;char&nbsp;max<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'shiptocity'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'Kansas&nbsp;City'</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Ship&nbsp;to&nbsp;city.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'shiptostate'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'MO'</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Ship&nbsp;to&nbsp;state.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'shiptozip'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'64111'</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Ship&nbsp;to&nbsp;postal&nbsp;code.&nbsp;&nbsp;10&nbsp;char&nbsp;max<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbnbsp;&nbsp;</span><span style="color: #DD0000">'shiptocountry'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">'US'</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Ship&nbsp;to&nbsp;country&nbsp;code.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'origid'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">''</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Required&nbsp;by&nbsp;some&nbsp;transaction&nbsp;types.&nbsp;&nbsp;ID&nbsp;of&nbsp;the&nbsp;original&nbsp;transaction&nbsp;referenced.&nbsp;&nbsp;The&nbsp;PNREF&nbsp;parameter&nbsp;returns&nbsp;this&nbsp;ID,&nbsp;and&nbsp;it&nbsp;appears&nbsp;as&nbsp;the&nbsp;Transaction&nbsp;ID&nbsp;in&nbsp;PayPal&nbsp;Manager&nbsp;reports.&nbsp;&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'custref'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">''</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'custcode'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">''</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'custip'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">''</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'invnum'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">''</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'ponum'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">''</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'starttime'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">''</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;For&nbsp;inquiry&nbsp;transaction&nbsp;when&nbsp;using&nbsp;CUSTREF&nbsp;to&nbsp;specify&nbsp;the&nbsp;transaction.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'endtime'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">''</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;For&nbsp;inquiry&nbsp;transaction&nbsp;when&nbsp;using&nbsp;CUSTREF&nbsp;to&nbsp;specify&nbsp;the&nbsp;transaction.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'securetoken'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">''</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Required&nbsp;if&nbsp;using&nbsp;secure&nbsp;tokens.&nbsp;&nbsp;A&nbsp;value&nbsp;the&nbsp;Payflow&nbsp;server&nbsp;created&nbsp;upon&nbsp;your&nbsp;request&nbsp;for&nbsp;storing&nbsp;transaction&nbsp;data.&nbsp;&nbsp;32&nbsp;char<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'partialauth'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">''</span><span style="color: #007700">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Required&nbsp;for&nbsp;partial&nbsp;authorizations.&nbsp;&nbsp;Set&nbsp;to&nbsp;Y&nbsp;to&nbsp;submit&nbsp;a&nbsp;partial&nbsp;auth.&nbsp;&nbsp;&nbsp;&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">'authcode'</span><span style="color: #007700">=&gt;</span><span style="color: #DD0000">''&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Rrequired&nbsp;for&nbsp;voice&nbsp;authorizations.&nbsp;&nbsp;Returned&nbsp;only&nbsp;for&nbsp;approved&nbsp;voice&nbsp;authorization&nbsp;transactions.&nbsp;&nbsp;AUTHCODE&nbsp;is&nbsp;the&nbsp;approval&nbsp;code&nbsp;received&nbsp;over&nbsp;the&nbsp;phone&nbsp;from&nbsp;the&nbsp;processing&nbsp;network.&nbsp;&nbsp;6&nbsp;char&nbsp;max<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">);<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$PayPalResult&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">$PayPal</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">ProcessTransaction</span><span style="color: #007700">(</span><span style="color: #0000BB">$PayPalRequestData</span><span style="color: #007700">);<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;if(!</span><span style="color: #0000BB">$this</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">paypal_payflow</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">APICallSuccessful</span><span style="color: #007700">(</span><span style="color: #0000BB">$PayPalResult</span><span style="color: #007700">[</span><span style="color: #DD0000">'RESULT'</span><span style="color: #007700">]))<br />&nbsp;&nbsp;&nbsp;&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Error<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #DD0000">'&lt;pre&nbsp;/&gt;'</span><span style="color: #007700">;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">print_r</span><span style="color: #007700">(</span><span style="color: #0000BB">$PayPalResult</span><span style="color: #007700">);<br />&nbsp;&nbsp;&nbsp;&nbsp;}<br />&nbsp;&nbsp;&nbsp;&nbsp;else<br />&nbsp;&nbsp;&nbsp;&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Successful&nbsp;call.&nbsp;&nbsp;Load&nbsp;view&nbsp;or&nbsp;whatever&nbsp;you&nbsp;need&nbsp;to&nbsp;do&nbsp;here.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #DD0000">'&lt;pre&nbsp;/&gt;'</span><span style="color: #007700">;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">print_r</span><span style="color: #007700">(</span><span style="color: #0000BB">$PayPalResult</span><span style="color: #007700">);<br />&nbsp;&nbsp;&nbsp;&nbsp;}<br />}</span>
</span>
</code></p>
<p><a href="http://www.angelleye.com/demo/codeigniter/paypal/payflow/process_transaction_demo" target="_blank">Run the code above and see the output.</a></p>
<p>&nbsp;</p>
</body>
</html>