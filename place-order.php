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
<!--	    <div class="form-actions">
		<button type="submit" class="btn btn-primary">Submit</button>
		<button type="reset" class="btn">Cancel</button>
	    </div>-->
        </fieldset> 
        
        <fieldset>
            <legend>Order Details</legend>
            <div class="control-group">
                <label class="control-label" for="topic">Topic:<span>*</span></label>
                <div class="controls">
                    <input type="text" class="input-xlarge" name="topic" id="topic" value="" placeholder="Topic">
                </div>
            </div>
	    <div class="control-group">
                <label class="control-label" for="type_document">Type of document:<span></span></label>
                <div class="controls">
                    <select name="type_document" id="type_document" class="input-xlarge">
			<option selected="selected" value="0">Essay</option>
                        <option value="13">Term Paper</option>
                        <option value="14">Research Paper</option>
                        <option value="39">Coursework</option>
                        <option value="37">Book Report</option>
                        <option value="38">Book Review</option>
                        <option value="85">Movie Review</option>
                        <option value="242">Research Summary</option>
                        <option value="1">Dissertation</option>
                        <option value="15">Thesis</option>
                        <option value="172">Thesis/Dissertation Proposal</option>
                        <option value="40">Research Proposal</option>
                        <option value="146">Dissertation Chapter - Abstract</option>
                        <option value="147">Dissertation Chapter - Introduction Chapter</option>
                        <option value="148">Dissertation Chapter - Literature Review</option>
                        <option value="149">Dissertation Chapter - Methodology</option>
                        <option value="150">Dissertation Chapter - Results</option>
                        <option value="151">Dissertation Chapter - Discussion</option>
                        <option value="159">Dissertation Services - Editing</option>
                        <option value="174">Dissertation Services - Proofreading</option>
                        <option value="152">Formatting</option>
                        <option value="142">Admission Services - Admission Essay</option>
                        <option value="143">Admission Services - Scholarship Essay</option>
                        <option value="144">Admission Services - Personal Statement</option>
                        <option value="145">Admission Services - Editing</option>
                        <option value="3">Editing</option>
                        <option value="163">Proofreading</option>
                        <option value="80">Case Study</option>
                        <option value="83">Lab Report</option>
                        <option value="84">Speech/Presentation</option>
                        <option value="234">Math/Physics/Economics/Statistics Problems</option>
                        <option value="168">Article</option>
                        <option value="169">Article Critique</option>
                        <option value="170">Annotated Bibliography</option>
                        <option value="171">Reaction Paper</option>
                        <option value="125">Multiple Choice Questions (Non-time-framed)</option>
                        <option value="126">Multiple Choice Questions (Time-framed)</option>
                        <option value="173">Statistics Project</option>
                        <option value="51">PowerPoint Presentation</option>
                        <option value="182">Programming</option>
                        <option value="260">Mind/Concept mapping</option>
                        <option value="261">Multimedia Project</option>
                        <option value="262">Online assignment</option>
                        <option value="263">Simulation report</option>
                    </select>
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label" for="urgency">Urgency:<span></span></label>
                <div class="controls">
                    <select name="urgency" id="urgency" class="input-xlarge">
                        <option value="11">10 days</option>
                        <option value="1">7 days</option>
                        <option value="3">5 days</option>
                        <option value="4">4 days</option>
                        <option value="5">3 days</option>
                        <option value="6">48 hours</option>
                        <option value="7">24 hours</option>
                        <option value="8">12 hours</option>
                        <option value="9">6 hours</option>
                        <option value="10">3 hours</option>
                    </select>
                </div>
            </div>
            
             <div class="control-group">
                <label class="control-label" for="level">Level:<span></span></label>
                <div class="controls">
                    <input type="text" class="input-xlarge" name="level" id="level" value="" placeholder="Level">
<!--                    <select style="display: none;" id="level" name="level" size="1">
                                                    <option value="1" selected="selected">Standard Quality</option>
                                                    <option value="2">Premium Quality</option>
                                                    <option value="27">Platinum Quality</option>
                                                </select>-->
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="level">Spacing:<span></span></label>
                <div class="controls">
                 
		            <select style="display: none;" id="o_interval" name="o_interval" size="1" class=" linear">
                                <option selected="selected" value="0">Double Spaced</option>
                                <option value="1">Single Spaced</option>
                            </select>
                            <span id="linear-select-o_interval" class="linear-select"><a class="linear-first-opt selected" href="#">
                                <input value="0" type="hidden">Double Spaced</a><a class="linear-last-opt" href="#">
                                <input value="1" type="hidden">Single Spaced</a>
                            </span>										
              
                </div>
            </div>
            
               
            <div class="control-group">
                <label class="control-label" for="number_of_pages">Number of pages/words:<span>*</span></label>
                
                <div class="controls">
                    <select name="number_of_pages" id="number_of_pages" class="input-xlarge">
                    <option selected="selected" value="0">select</option>
                    <option value="1">1 page(s) / 275 words</option>
                    <option value="2">2 page(s) / 550 words</option>
                    <option value="3">3 page(s) / 825 words</option>
                    <option value="4">4 page(s) / 1100 words</option>
                    <option value="5">5 page(s) / 1375 words</option>
                    <option value="6">6 page(s) / 1650 words</option>
                    <option value="7">7 page(s) / 1925 words</option>
                    <option value="8">8 page(s) / 2200 words</option>
                    <option value="9">9 page(s) / 2475 words</option>
                    <option value="10">10 page(s) / 2750 words</option>
                    <option value="11">11 page(s) / 3025 words</option>
                    <option value="12">12 page(s) / 3300 words</option>
                    <option value="13">13 page(s) / 3575 words</option>
                    <option value="14">14 page(s) / 3850 words</option>
                    <option value="15">15 page(s) / 4125 words</option>
                    <option value="16">16 page(s) / 4400 words</option>
                    <option value="17">17 page(s) / 4675 words</option>
                    <option value="18">18 page(s) / 4950 words</option>
                    <option value="19">19 page(s) / 5225 words</option>
                    <option value="20">20 page(s) / 5500 words</option>
                    <option value="21">21 page(s) / 5775 words</option>
                    <option value="22">22 page(s) / 6050 words</option>
                    <option value="23">23 page(s) / 6325 words</option>
                    <option value="24">24 page(s) / 6600 words</option>
                    <option value="25">25 page(s) / 6875 words</option>
                    <option value="26">26 page(s) / 7150 words</option>
                    <option value="27">27 page(s) / 7425 words</option>
                    <option value="28">28 page(s) / 7700 words</option>
                    <option value="29">29 page(s) / 7975 words</option>
                    <option value="30">30 page(s) / 8250 words</option>
                    <option value="31">31 page(s) / 8525 words</option>
                    <option value="32">32 page(s) / 8800 words</option>
                    <option value="33">33 page(s) / 9075 words</option>
                    <option value="34">34 page(s) / 9350 words</option>
                    <option value="35">35 page(s) / 9625 words</option>
                    <option value="36">36 page(s) / 9900 words</option>
                    <option value="37">37 page(s) / 10175 words</option>
                    <option value="38">38 page(s) / 10450 words</option>
                    <option value="39">39 page(s) / 10725 words</option>
                    <option value="40">40 page(s) / 11000 words</option>
                    <option value="41">41 page(s) / 11275 words</option>
                    <option value="42">42 page(s) / 11550 words</option>
                    <option value="43">43 page(s) / 11825 words</option>
                    <option value="44">44 page(s) / 12100 words</option>
                    <option value="45">45 page(s) / 12375 words</option>
                    <option value="46">46 page(s) / 12650 words</option>
                    <option value="47">47 page(s) / 12925 words</option>
                    <option value="48">48 page(s) / 13200 words</option>
                    <option value="49">49 page(s) / 13475 words</option>
                    <option value="50">50 page(s) / 13750 words</option>
                    <option value="51">51 page(s) / 14025 words</option>
                    <option value="52">52 page(s) / 14300 words</option>
                    <option value="53">53 page(s) / 14575 words</option>
                    <option value="54">54 page(s) / 14850 words</option>
                    <option value="55">55 page(s) / 15125 words</option>
                    <option value="56">56 page(s) / 15400 words</option>
                    <option value="57">57 page(s) / 15675 words</option>
                    <option value="58">58 page(s) / 15950 words</option>
                    <option value="59">59 page(s) / 16225 words</option>
                    <option value="60">60 page(s) / 16500 words</option>
                    <option value="61">61 page(s) / 16775 words</option>
                    <option value="62">62 page(s) / 17050 words</option>
                    <option value="63">63 page(s) / 17325 words</option>
                    <option value="64">64 page(s) / 17600 words</option>
                    <option value="65">65 page(s) / 17875 words</option>
                    <option value="66">66 page(s) / 18150 words</option>
                    <option value="67">67 page(s) / 18425 words</option>
                    <option value="68">68 page(s) / 18700 words</option>
                    <option value="69">69 page(s) / 18975 words</option>
                    <option value="70">70 page(s) / 19250 words</option>
                    <option value="71">71 page(s) / 19525 words</option>
                    <option value="72">72 page(s) / 19800 words</option>
                    <option value="73">73 page(s) / 20075 words</option>
                    <option value="74">74 page(s) / 20350 words</option>
                    <option value="75">75 page(s) / 20625 words</option>
                    <option value="76">76 page(s) / 20900 words</option>
                    <option value="77">77 page(s) / 21175 words</option>
                    <option value="78">78 page(s) / 21450 words</option>
                    <option value="79">79 page(s) / 21725 words</option>
                    <option value="80">80 page(s) / 22000 words</option>
                    <option value="81">81 page(s) / 22275 words</option>
                    <option value="82">82 page(s) / 22550 words</option>
                    <option value="83">83 page(s) / 22825 words</option>
                    <option value="84">84 page(s) / 23100 words</option>
                    <option value="85">85 page(s) / 23375 words</option>
                    <option value="86">86 page(s) / 23650 words</option>
                    <option value="87">87 page(s) / 23925 words</option>
                    <option value="88">88 page(s) / 24200 words</option>
                    <option value="89">89 page(s) / 24475 words</option>
                    <option value="90">90 page(s) / 24750 words</option>
                    <option value="91">91 page(s) / 25025 words</option>
                    <option value="92">92 page(s) / 25300 words</option>
                    <option value="93">93 page(s) / 25575 words</option>
                    <option value="94">94 page(s) / 25850 words</option>
                    <option value="95">95 page(s) / 26125 words</option>
                    <option value="96">96 page(s) / 26400 words</option>
                    <option value="97">97 page(s) / 26675 words</option>
                    <option value="98">98 page(s) / 26950 words</option>
                    <option value="99">99 page(s) / 27225 words</option>
                    <option value="100">100 page(s) / 27500 words</option>
                    <option value="101">101 page(s) / 27775 words</option>
                    <option value="102">102 page(s) / 28050 words</option>
                    <option value="103">103 page(s) / 28325 words</option>
                    <option value="104">104 page(s) / 28600 words</option>
                    <option value="105">105 page(s) / 28875 words</option>
                    <option value="106">106 page(s) / 29150 words</option>
                    <option value="107">107 page(s) / 29425 words</option>
                    <option value="108">108 page(s) / 29700 words</option>
                    <option value="109">109 page(s) / 29975 words</option>
                    <option value="110">110 page(s) / 30250 words</option>
                    <option value="111">111 page(s) / 30525 words</option>
                    <option value="112">112 page(s) / 30800 words</option>
                    <option value="113">113 page(s) / 31075 words</option>
                    <option value="114">114 page(s) / 31350 words</option>
                    <option value="115">115 page(s) / 31625 words</option>
                    <option value="116">116 page(s) / 31900 words</option>
                    <option value="117">117 page(s) / 32175 words</option>
                    <option value="118">118 page(s) / 32450 words</option>
                    <option value="119">119 page(s) / 32725 words</option>
                    <option value="120">120 page(s) / 33000 words</option>
                    <option value="121">121 page(s) / 33275 words</option>
                    <option value="122">122 page(s) / 33550 words</option>
                    <option value="123">123 page(s) / 33825 words</option>
                    <option value="124">124 page(s) / 34100 words</option>
                    <option value="125">125 page(s) / 34375 words</option>
                    <option value="126">126 page(s) / 34650 words</option>
                    <option value="127">127 page(s) / 34925 words</option>
                    <option value="128">128 page(s) / 35200 words</option>
                    <option value="129">129 page(s) / 35475 words</option>
                    <option value="130">130 page(s) / 35750 words</option>
                    <option value="131">131 page(s) / 36025 words</option>
                    <option value="132">132 page(s) / 36300 words</option>
                    <option value="133">133 page(s) / 36575 words</option>
                    <option value="134">134 page(s) / 36850 words</option>
                    <option value="135">135 page(s) / 37125 words</option>
                    <option value="136">136 page(s) / 37400 words</option>
                    <option value="137">137 page(s) / 37675 words</option>
                    <option value="138">138 page(s) / 37950 words</option>
                    <option value="139">139 page(s) / 38225 words</option>
                    <option value="140">140 page(s) / 38500 words</option>
                    <option value="141">141 page(s) / 38775 words</option>
                    <option value="142">142 page(s) / 39050 words</option>
                    <option value="143">143 page(s) / 39325 words</option>
                    <option value="144">144 page(s) / 39600 words</option>
                    <option value="145">145 page(s) / 39875 words</option>
                    <option value="146">146 page(s) / 40150 words</option>
                    <option value="147">147 page(s) / 40425 words</option>
                    <option value="148">148 page(s) / 40700 words</option>
                    <option value="149">149 page(s) / 40975 words</option>
                    <option value="150">150 page(s) / 41250 words</option>
                    <option value="151">151 page(s) / 41525 words</option>
                    <option value="152">152 page(s) / 41800 words</option>
                    <option value="153">153 page(s) / 42075 words</option>
                    <option value="154">154 page(s) / 42350 words</option>
                    <option value="155">155 page(s) / 42625 words</option>
                    <option value="156">156 page(s) / 42900 words</option>
                    <option value="157">157 page(s) / 43175 words</option>
                    <option value="158">158 page(s) / 43450 words</option>
                    <option value="159">159 page(s) / 43725 words</option>
                    <option value="160">160 page(s) / 44000 words</option>
                    <option value="161">161 page(s) / 44275 words</option>
                    <option value="162">162 page(s) / 44550 words</option>
                    <option value="163">163 page(s) / 44825 words</option>
                    <option value="164">164 page(s) / 45100 words</option>
                    <option value="165">165 page(s) / 45375 words</option>
                    <option value="166">166 page(s) / 45650 words</option>
                    <option value="167">167 page(s) / 45925 words</option>
                    <option value="168">168 page(s) / 46200 words</option>
                    <option value="169">169 page(s) / 46475 words</option>
                    <option value="170">170 page(s) / 46750 words</option>
                    <option value="171">171 page(s) / 47025 words</option>
                    <option value="172">172 page(s) / 47300 words</option>
                    <option value="173">173 page(s) / 47575 words</option>
                    <option value="174">174 page(s) / 47850 words</option>
                    <option value="175">175 page(s) / 48125 words</option>
                    <option value="176">176 page(s) / 48400 words</option>
                    <option value="177">177 page(s) / 48675 words</option>
                    <option value="178">178 page(s) / 48950 words</option>
                    <option value="179">179 page(s) / 49225 words</option>
                    <option value="180">180 page(s) / 49500 words</option>
                    <option value="181">181 page(s) / 49775 words</option>
                    <option value="182">182 page(s) / 50050 words</option>
                    <option value="183">183 page(s) / 50325 words</option>
                    <option value="184">184 page(s) / 50600 words</option>
                    <option value="185">185 page(s) / 50875 words</option>
                    <option value="186">186 page(s) / 51150 words</option>
                    <option value="187">187 page(s) / 51425 words</option>
                    <option value="188">188 page(s) / 51700 words</option>
                    <option value="189">189 page(s) / 51975 words</option>
                    <option value="190">190 page(s) / 52250 words</option>
                    <option value="191">191 page(s) / 52525 words</option>
                    <option value="192">192 page(s) / 52800 words</option>
                    <option value="193">193 page(s) / 53075 words</option>
                    <option value="194">194 page(s) / 53350 words</option>
                    <option value="195">195 page(s) / 53625 words</option>
                    <option value="196">196 page(s) / 53900 words</option>
                    <option value="197">197 page(s) / 54175 words</option>
                    <option value="198">198 page(s) / 54450 words</option>
                    <option value="199">199 page(s) / 54725 words</option>
                    <option value="200">200 page(s) / 55000 words</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="level">Currency:<span></span></label>
                <div class="controls">
                    <input type="text" class="input-xlarge" name="spacing" id="spacing" value="" placeholder="Spacing">
                </div>
            </div>
                <div class="control-group">
                    <label class="control-label" for="subject_area">Subject Area:<span>*</span></label>
                <div class="controls">
                    <select name="subject_area" id="subject_area" class="input-xlarge">
                        <option value="0">select</option>
                        <option value="10">Art</option>
                        <option value="12">Architecture</option>
                        <option value="15">Dance</option>
                        <option value="17">Design Analysis</option>
                        <option value="13">Drama</option>
                        <option value="16">Movies</option>
                        <option value="18">Music</option>
                        <option value="11">Paintings</option>
                        <option value="14">Theatre</option>
                        <option value="112">Biology</option>
                        <option value="52">Business</option>
                        <option value="111">Chemistry</option>
                        <option value="102">Communications and Media</option>
                        <option value="105">Advertising</option>
                        <option value="107">Communication Strategies</option>
                        <option value="103">Journalism</option>
                        <option value="104">Public Relations</option>
                        <option value="115">Creative writing</option>
                        <option value="53">Economics</option>
                        <option value="60">Accounting</option>
                        <option value="61">Case Study</option>
                        <option value="58">Company Analysis</option>
                        <option value="62">E-Commerce</option>
                        <option value="59">Finance</option>
                        <option value="117">International Affairs/Relations</option>
                        <option value="57">Investment</option>
                        <option value="63">Logistics</option>
                        <option value="64">Trade</option>
                        <option value="87">Education</option>
                        <option value="93">Application Essay</option>
                        <option value="89">Education Theories</option>
                        <option value="88">Pedagogy</option>
                        <option value="90">Teacher's Career</option>
                        <option value="67">Engineering</option><option value="9">English</option>
                        <option value="24">Ethics</option><option value="36">History</option>
                        <option value="38">African-American Studies</option>
                        <option value="37">American History</option>
                        <option value="42">Asian Studies</option>
                        <option value="41">Canadian Studies</option>
                        <option value="44">East European Studies</option>
                        <option value="45">Holocaust</option>
                        <option value="40">Latin-American Studies</option>
                        <option value="39">Native-American Studies</option>
                        <option value="43">West European Studies</option>
                        <option value="47">Law</option>
                        <option value="49">Criminology</option>
                        <option value="48">Legal Issues</option>
                        <option value="7">Linguistics</option>
                        <option value="2">Literature</option>
                        <option value="4">American Literature</option>
                        <option value="5">Antique Literature</option>
                        <option value="6">Asian Literature</option>
                        <option value="3">English Literature</option>
                        <option value="116">Shakespeare Studies</option>
                        <option value="54">Management</option>
                        <option value="56">Marketing</option>
                        <option value="51">Mathematics</option>
                        <option value="94">Medicine and Health</option>
                        <option value="99">Alternative Medicine</option>
                        <option value="97">Healthcare</option>
                        <option value="101">Nursing</option>
                        <option value="95">Nutrition</option>
                        <option value="100">Pharmacology</option>
                        <option value="96">Sport</option>
                        <option value="78">Nature</option>
                        <option value="85">Agricultural Studies</option>
                        <option value="113">Anthropology</option>
                        <option value="86">Astronomy</option>
                        <option value="83">Environmental Issues</option>
                        <option value="79">Geography</option>
                        <option value="80">Geology</option>
                        <option value="28">Philosophy</option>
                        <option value="110">Physics</option>
                        <option value="29">Political Science</option>
                        <option value="21">Psychology</option>
                        <option value="108">Religion and Theology</option>
                        <option value="22">Sociology</option>
                        <option value="65">Technology</option>
                        <option value="71">Aeronautics</option>
                        <option value="70">Aviation</option>
                        <option value="72">Computer Science</option>
                        <option value="73">Internet</option>
                        <option value="75">IT Management</option>
                        <option value="77">Web Design</option>
                        <option value="114">Tourism</option>
                    </select>
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