<?php include('common/header.php') ?>

<!-- Example row of columns -->
<div class="row-fluid">
    <form action="" id="contact-form" class="form-horizontal">
        <fieldset>
            <legend>Personal Info</legend>
            <div class="control-group">
                <label class="control-label" for="first_name">First name:<span>*</span></label>
                <div class="controls">
                    <input type="text" class="input-xlarge" name="first_name" id="first_name" value="" placeholder="Enter First Name">
                </div>
            </div>
	    <div class="control-group">
                <label class="control-label" for="last_name">Last name:<span>*</span></label>
                <div class="controls">
                    <input type="text" class="input-xlarge" name="last_name" id="last_name" value="" placeholder="Enter Last Name">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="email">Email : <span>*</span></label>
                <div class="controls">
                    <input type="text" class="input-xlarge" name="email" id="email" placeholder="Enter valid email address" value="">
                </div>
            </div>
	    <div class="control-group">
                <label class="control-label" for="re_email">Re-type email: <span>*</span></label>
                <div class="controls">
                    <input type="text" class="input-xlarge" name="re_email" id="re_email" value="" placeholder="Enter valid email address">
                </div>
            </div>

	    <div class="control-group">
                <label class="control-label" for="country_code">Country code:<span>*</span></label>
                <div class="controls">
                    <select name="country_code" id="country_code" class="input-xlarge">
			<option value="">Select country code</option>
			<option value="3">USA - 1</option>
			<option value="17">Australia - 61</option>
			<option value="240">Canada - 1</option>
			<option value="192">Saudi Arabia - 966</option>
			<option value="225">United Arab Emirates - 971</option>
			<option value="226">United Kingdom - 44</option>
			<option value="4">Afghanistan - 93</option>
			<option value="5">Albania - 355</option>
			<option value="6">Algeria - 213</option>
			<option value="7">American Samoa - 684</option>
			<option value="8">Andorra - 376</option>
			<option value="9">Angola - 244</option>
			<option value="10">Anguilla - 264*</option>
			<option value="11">Antarctica - 672</option>
			<option value="12">Antigua - 268*</option>
			<option value="13">Argentina - 54</option>
			<option value="14">Armenia - 374</option><option value="15">Aruba - 297</option><option value="16">Ascension Island - 247</option><option value="17">Australia - 61</option><option value="18">Austria - 43</option><option value="19">Azberbaijan - 994</option><option value="20">Bahamas - 242*</option><option value="21">Bahrain - 973</option><option value="22">Bangladesh - 880</option><option value="23">Barbados - 246*</option><option value="24">Barbuda - 268*</option><option value="25">Belarus - 375</option><option value="26">Belgium - 32</option><option value="27">Belize - 501</option><option value="28">Benin - 229</option><option value="29">Bermuda - 441*</option><option value="30">Bhutan - 975</option><option value="31">Bolivia - 591</option><option value="32">Bosnia - 387</option><option value="33">Botswana - 267</option><option value="34">Brazil - 55</option><option value="35">British Virgin Islands - 284*</option><option value="36">Brunei - 673</option><option value="37">Bulgaria - 359</option><option value="38">Burkina Faso - 226</option><option value="40">Burundi - 257</option><option value="41">Cambodia - 855</option><option value="42">Cameroon - 237</option><option value="240">Canada - 1</option><option value="44">Cape Verde Islands - 238</option><option value="45">Cayman Islands - 345*</option><option value="46">Central African Rep. - 236</option><option value="47">Chad - 235</option><option value="48">Chile - 56</option><option value="49">China - 86</option><option value="50">Christmas Island - 61</option><option value="51">Cocos Islands - 61</option><option value="52">Colombia - 57</option><option value="53">Comoros - 269</option><option value="54">Congo - 242</option><option value="55">Congo, Dem. Rep. of - 243</option><option value="56">Cook Islands - 682</option><option value="57">Costa Rica - 506</option><option value="58">Croatia - 385</option><option value="59">Cuba - 53</option><option value="60">Cyprus - 357</option><option value="61">Czech Republic - 420</option><option value="62">Denmark - 45</option><option value="63">Diego Garcia - 246</option><option value="64">Djibouti - 253</option><option value="65">Dominica - 767*</option><option value="66">Dominican Rep. - 809*</option><option value="67">Ecuador - 593</option><option value="68">Egypt - 20</option><option value="69">El Salvador - 503</option><option value="70">Equatorial Guinea - 240</option><option value="71">Eritrea - 291</option><option value="72">Estonia - 372</option><option value="73">Ethiopia - 251</option><option value="74">Faeroe Islands - 298</option><option value="75">Falkland Islands - 500</option><option value="76">Fiji Islands - 679</option><option value="77">Finland - 358</option>
			<option value="78">France - 33</option><option value="80">French Guiana - 594</option><option value="81">French Polynesia - 689</option><option value="82">Gabon - 241</option><option value="83">Gambia - 220</option><option value="84">Georgia - 995</option><option value="85">Germany - 49</option><option value="86">Ghana - 233</option><option value="87">Gibraltar - 350</option><option value="88">Greece - 30</option><option value="89">Greenland - 299</option><option value="90">Grenada - 473*</option><option value="91">Guadeloupe - 590</option><option value="92">Guam - 671</option><option value="94">Guatemala - 502</option><option value="95">Guinea - 224</option><option value="96">Guinea Bissau - 245</option><option value="97">Guyana - 592</option><option value="98">Haiti - 509</option><option value="99">Honduras - 504</option><option value="100">Hong Kong - 852</option><option value="101">Hungary - 36</option><option value="102">Iceland - 354</option><option value="103">India - 91</option><option value="104">Indonesia - 62</option><option value="105">Iran - 98</option><option value="106">Iraq - 964</option><option value="107">Ireland - 353</option><option value="108">Israel - 972</option><option value="109">Italy - 39</option><option value="111">Jamaica - 876*</option><option value="112">Japan - 81</option><option value="113">Jordan - 962</option><option value="114">Kazakhstan - 7</option><option value="115">Kenya - 254</option><option value="116">Kiribati - 686</option><option value="117">Korea, North - 850</option><option value="118">Korea, South - 82</option><option value="119">Kuwait - 965</option><option value="120">Kyrgyzstan - 996</option><option value="121">Laos - 856</option><option value="122">Latvia - 371</option><option value="123">Lebanon - 961</option><option value="124">Lesotho - 266</option><option value="125">Liberia - 231</option><option value="126">Libya - 218</option><option value="127">Liechtenstein - 423</option><option value="128">Lithuania - 370</option><option value="129">Luxembourg - 352</option><option value="130">Macau - 853</option><option value="131">Macedonia - 389</option><option value="132">Madagascar - 261</option><option value="133">Malawi - 265</option><option value="134">Malaysia - 60</option><option value="135">Maldives - 960</option><option value="136">Mali - 223</option><option value="137">Malta - 356</option><option value="138">Mariana Islands - 670*</option><option value="139">Marshall Islands - 692</option><option value="140">Martinique - 596</option><option value="141">Mauritania - 222</option><option value="142">Mauritius - 230</option><option value="143">Mayotte Islands - 269</option><option value="144">Mexico - 52</option><option value="145">Micronesia - 691</option><option value="147">Moldova - 373</option><option value="148">Monaco - 377</option><option value="149">Mongolia - 976</option><option value="150">Montserrat - 664*</option><option value="151">Morocco - 212</option><option value="152">Mozambique - 258</option><option value="153">Myanmar (Burma) - 95</option><option value="154">Namibia - 264</option><option value="155">Nauru - 674</option><option value="156">Nepal - 977</option><option value="157">Netherlands - 31</option><option value="158">Netherlands Antilles - 599</option><option value="159">Nevis - 869*</option><option value="160">New Caledonia - 687</option><option value="161">New Zealand - 64</option><option value="162">Nicaragua - 505</option><option value="163">Niger - 227</option><option value="164">Nigeria - 234</option><option value="165">Niue - 683</option><option value="166">Norfolk Island - 672</option><option value="167">Norway - 47</option><option value="168">Oman - 968</option><option value="169">Pakistan - 92</option><option value="170">Palau - 680</option><option value="171">Palestine - 970</option><option value="172">Panama - 507</option><option value="173">Papua New Guinea - 675</option><option value="174">Paraguay - 595</option><option value="175">Peru - 51</option><option value="176">Philippines - 63</option><option value="177">Poland - 48</option><option value="178">Portugal - 351</option><option value="179">Puerto Rico - 787*</option><option value="180">Qatar - 974</option><option value="181">Reunion Island - 262</option><option value="182">Romania - 40</option><option value="183">Russia - 7</option><option value="184">Rwanda - 250</option><option value="190">San Marino - 378</option><option value="191">Sao Tome &amp; Principe - 239</option><option value="192">Saudi Arabia - 966</option><option value="193">Senegal - 221</option><option value="194">Serbia - 381</option><option value="195">Seychelles - 248</option><option value="196">Sierra Leone - 232</option><option value="197">Singapore - 65</option><option value="198">Slovakia - 421</option><option value="199">Slovenia - 386</option><option value="200">Solomon Islands - 677</option><option value="201">Somalia - 252</option><option value="202">South Africa - 27</option><option value="203">Spain - 34</option><option value="204">Sri Lanka - 94</option><option value="185">St. Helena - 290</option><option value="186">St. Kitts - 869*</option><option value="187">St. Lucia - 758*</option><option value="188">St. Perre &amp; Miquelon - 508</option><option value="189">St. Vincent - 784*</option><option value="205">Sudan - 249</option><option value="206">Suriname - 597</option><option value="207">Swaziland - 268</option><option value="208">Sweden - 46</option><option value="209">Switzerland - 41</option><option value="210">Syria - 963</option><option value="211">Taiwan - 886</option><option value="212">Tajikistan - 992</option><option value="213">Tanzania - 255</option><option value="214">Thailand - 66</option><option value="215">Togo - 228</option><option value="216">Tonga - 676</option><option value="217">Trinidad &amp; Tobago - 868*</option><option value="218">Tunisia - 216</option><option value="219">Turkey - 90</option><option value="220">Turkmenistan - 993</option><option value="221">Turks &amp; Caicos - 649*</option><option value="222">Tuvalu - 688</option><option value="223">Uganda - 256</option><option value="224">Ukraine - 380</option><option value="225">United Arab Emirates - 971</option><option value="226">United Kingdom - 44</option><option value="227">Uruguay - 598</option><option value="3">USA - 1</option><option value="228">Uzbekistan - 998</option><option value="229">Vanuatu - 678</option><option value="230">Vatican City - 39</option><option value="231">Venezuela - 58</option><option value="232">Vietnam - 84</option><option value="234">Wallis &amp; Futuna - 681</option><option value="235">Western Samoa - 685</option><option value="236">Yemen - 967</option><option value="237">Yugoslavia - 381</option><option value="238">Zambia - 260</option><option value="239">Zimbabwe - 263</option></select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="pcountry_code">Contact phone :<span>*</span></label>
                <div class="controls">
                    <input type="text" class="input-mini" name="pcountry_code" value="" id="pcountry_code" placeholder="code">
		    <input type="text" class="input-mini" name="pcountry_area" value="" id="pcountry_area" placeholder="area">
		    <input type="text" class="input-medium" name="phone_no" value="" id="phone_no" placeholder="number">
		    <select name="phone_type" id="phone_type" class="input-medium">
			<option value="">Select</option>
			<option value="land line">land line</option>
			<option value="mobile">mobile</option>
		    </select>
		    <span class="help-block">(country code - area code - number) Valid phone number where you can be reached is required</span>
                </div>
            </div>
	    <div class="form-actions">
		<button type="submit" class="btn btn-primary">Submit</button>
		<button type="reset" class="btn">Cancel</button>
	    </div>
        </fieldset>
    </form>
</div>

<style type="text/css">
    label.valid {
        width: 24px;
        height: 24px;
        background: url(theme/img/valid.png) center center no-repeat;
        display: inline-block;
        text-indent: -9999px;
    }
    label.error {
        font-weight: bold;
        color: red;
        padding: 2px 8px;
        margin-top: 2px;
	display: inline;
    }
</style>
<script src="theme/js/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
	$("#country_code").change(function() {
	    var str = $("#country_code option:selected").text();
	    var value = str.split("-");
	    $("#pcountry_code").val(value[1]);
	});


	$('#contact-form').validate(
		{
		    rules: {
			first_name: {
			    minlength: 2,
			    required: true
			},
			last_name: {
			    minlength: 2,
			    required: true
			},
			email: {
			    required: true,
			    email: true
			},
			re_email: {
			    required: true,
			    email: true,
			    equalTo: "#email"
			},
			country_code: {
			    required: true,
			},
			pcountry_code: {
			    required: true,
			},
			pcountry_area: {
			    required: true,
			    number: true
			},
			phone_no: {
			    required: true,
			    number: true
			},
			phone_type: {
			    required: true
			},
		    },
		    highlight: function(element) {
			$(element).closest('.control-group').removeClass('success').addClass('error');
		    },
		    success: function(element) {
			element
				.addClass('valid')
				.closest('.control-group').removeClass('error').addClass('success');
		    }
		});
    }); // end document.ready
</script>
<?php include('common/footer.php') ?>