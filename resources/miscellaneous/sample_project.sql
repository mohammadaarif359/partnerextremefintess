-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2022 at 08:46 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sample_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `parent_id`, `title`, `slug`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'home', 'home', '<section id=\"hello\" class=\"home bg-mega\">\r\n		<div class=\"overlay\"></div>\r\n		<div class=\"container\">\r\n			<div class=\"row\">\r\n				<div class=\"main_home\">\r\n					<div class=\"home_text\">\r\n						<h1 class=\"text-white\">WE’RE <br> CREATIVE DESIGNERS!</h1>\r\n					</div>\r\n					<div class=\"home_btns m-top-40\">\r\n						<a href=\"https://bootstrapthemes.co\" target=\"_blank\" class=\"btn btn-primary m-top-20\">GET STARTED</a>\r\n						<a href=\"https://bootstrapthemes.co\" target=\"_blank\" class=\"btn btn-default m-top-20\">DOWNLOAD NOW</a>\r\n					</div>\r\n				</div>\r\n			</div>\r\n		</div>\r\n	</section>\r\n\r\n	<!--About Sections-->\r\n	<section id=\"about\" class=\"about roomy-50\">\r\n		<div class=\"container\">\r\n			<div class=\"row\">\r\n				<div class=\"main_about\">\r\n					<div class=\"col-md-6\">\r\n						<div class=\"about_content\">\r\n							<h2>ABOUT US</h2>\r\n							<div class=\"separator_left\"></div>\r\n							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>\r\n							<div class=\"about_btns m-top-40\">\r\n								<a href=\"\" class=\"btn btn-primary\">DOWNLOAD NOW</a>\r\n							</div>\r\n						</div>\r\n					</div>\r\n					<div class=\"col-md-6\">\r\n						<div class=\"about_accordion wow fadeIn\">\r\n							<div id=\"faq_main_content\" class=\"faq_main_content\">\r\n								<h6><i class=\"fa fa-angle-right\"></i> UNIQUE DESIGN </h6>\r\n								<div>\r\n									<div class=\"content\">\r\n										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, </p>\r\n									</div>\r\n								</div>\r\n								<h6 class=\"open\"><i class=\"fa fa-angle-right\"></i> EXPERIENCE TEAM</h6>\r\n								<div class=\"open\">\r\n									<div class=\"content\">\r\n										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, </p>\r\n									</div>\r\n								</div>\r\n								<h6> <i class=\"fa fa-angle-right\"></i> GREAT SERVICE </h6>\r\n								<div>\r\n									<div class=\"content\">\r\n										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, </p>\r\n									</div>\r\n								</div>\r\n								<h6><i class=\"fa fa-angle-right\"></i> FREE UPDATES </h6>\r\n								<div>\r\n									<div class=\"content\">\r\n										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, </p>\r\n									</div>\r\n								</div>\r\n							</div>\r\n						</div>\r\n					</div>\r\n				</div>\r\n			</div>\r\n			<!--End off row-->\r\n		</div>\r\n		<!--End off container -->\r\n		<br>\r\n		<br>\r\n		<br>\r\n		<br>\r\n		<hr>\r\n		<br>\r\n		<br>\r\n		<div class=\"container\">\r\n			<div class=\"row\">\r\n				<div class=\"about_bottom_content\">\r\n					<div class=\"col-md-4\">\r\n						<div class=\"about_bottom_item m-top-20\">\r\n							<div class=\"ab_head\">\r\n								<div class=\"ab_head_icon\">\r\n									<i class=\"icofont icofont-fire-burn\"></i>\r\n								</div>\r\n								<h6 class=\"m-top-20\"> WE’RE CREATIVE</h6>\r\n							</div>\r\n							<p class=\"m-top-20\">Lorem ipsum dolor sit amet, consectetuer adipiscing ealit, sed diaim nonummy nibsih euismod tincidiunt laorieet doloire magna diam aliquafm erat voluitpati. </p>\r\n						</div>\r\n					</div>\r\n					<div class=\"col-md-4\">\r\n						<div class=\"about_bottom_item m-top-20\">\r\n							<div class=\"ab_head\">\r\n								<div class=\"ab_head_icon\">\r\n									<i class=\"icofont icofont-speech-comments\"></i>\r\n								</div>\r\n								<h6 class=\"m-top-20\">WE\'RE FRIENDLY</h6>\r\n							</div>\r\n							<p class=\"m-top-20\">Lorem ipsum dolor sit amet, consectetuer adipiscing ealit, sed diaim nonummy nibsih euismod tincidiunt laorieet doloire magna diam aliquafm erat voluitpati. </p>\r\n						</div>\r\n					</div>\r\n					<div class=\"col-md-4\">\r\n						<div class=\"about_bottom_item m-top-20\">\r\n							<div class=\"ab_head\">\r\n								<div class=\"ab_head_icon\">\r\n									<i class=\"icofont icofont-heart\"></i>\r\n								</div>\r\n								<h6 class=\"m-top-20\">WE LOVE MINIMALISM</h6>\r\n							</div>\r\n							<p class=\"m-top-20\">Lorem ipsum dolor sit amet, consectetuer adipiscing ealit, sed diaim nonummy nibsih euismod tincidiunt laorieet doloire magna diam aliquafm erat voluitpati. </p>\r\n						</div>\r\n					</div>\r\n				</div>\r\n			</div>\r\n		</div>\r\n	</section>\r\n	\r\n	<section id=\"video\" class=\"video\">\r\n		<div class=\"overlay\"></div>\r\n		<div class=\"main_video roomy-50 m-top-100 m-bottom-100 text-center\">\r\n			<div class=\"video_text text-center\">\r\n				<a href=\"http://www.youtube.com/watch?v=7HKoqNJtMTQ\" class=\"video-link\"><span class=\"fa fa-play\"></span></a>\r\n			</div>\r\n		</div>\r\n	</section>\r\n	\r\n	<section id=\"service\" class=\"service\">\r\n		<div class=\"container\">\r\n			<div class=\"row\">\r\n				<div class=\"main_service roomy-40\">\r\n					<div class=\"col-md-8 col-sm-10 mr-md-auto ml-md-auto mr-sm-auto ml-sm-auto\">\r\n						<div class=\"head_title text-center\">\r\n							<h2>OUR SERVICES</h2>\r\n							<div class=\"separator_auto\"></div>\r\n							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>\r\n						</div>\r\n					</div>\r\n					<div class=\"row\">\r\n\r\n\r\n						<div class=\"col-md-4\">\r\n							<div class=\"service_item\">\r\n								<i class=\"icofont icofont-light-bulb\"></i>\r\n								<h6 class=\"m-top-30\">BRANDING</h6>\r\n								<div class=\"separator_small\"></div>\r\n								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>\r\n							</div>\r\n						</div>\r\n						<div class=\"col-md-4\">\r\n							<div class=\"service_item\">\r\n								<i class=\"icofont icofont-imac\"></i>\r\n								<h6 class=\"m-top-30\">BRANDING</h6>\r\n								<div class=\"separator_small\"></div>\r\n								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>\r\n							</div>\r\n						</div>\r\n						<div class=\"col-md-4\">\r\n							<div class=\"service_item\">\r\n								<i class=\"icofont icofont-video\"></i>\r\n								<h6 class=\"m-top-30\">BRANDING</h6>\r\n								<div class=\"separator_small\"></div>\r\n								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>\r\n							</div>\r\n						</div>\r\n					</div>\r\n				</div>\r\n			</div>\r\n			<!--End off row -->\r\n		</div>\r\n		<!--End off container -->\r\n	</section>\r\n	<section id=\"pricing\" class=\"pricing lightbg\">\r\n		<div class=\"container\">\r\n			<div class=\"row\">\r\n				<div class=\"main_pricing\">\r\n					<div class=\"col-md-8 ml-md-auto mr-md-auto\">\r\n						<div class=\"head_title text-center\">\r\n							<h2>OUR PRICING</h2>\r\n							<div class=\"separator_auto\"></div>\r\n							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>\r\n						</div>\r\n					</div>\r\n				</div>\r\n			</div>\r\n			<div class=\"row\">\r\n				<div class=\"col-md-4 col-sm-12\">\r\n					<div class=\"pricing_item\">\r\n						<div class=\"pricing_head p-top-30 p-bottom-100 text-center\">\r\n							<h3 class=\"text-uppercase\">STARTER</h3>\r\n						</div>\r\n						<div class=\"pricing_price_border text-center\">\r\n							<div class=\"pricing_price\">\r\n								<h3 class=\"text-white\">$19</h3>\r\n								<p class=\"text-white\">per month</p>\r\n							</div>\r\n						</div>\r\n\r\n						<div class=\"pricing_body bg-white p-top-110 p-bottom-60\">\r\n							<ul>\r\n								<li><i class=\"fa fa-check-circle text-primary\"></i> <span>10</span> user</li>\r\n								<li class=\"disabled\"><i class=\"fa fa-times-circle\"></i> Unlimited Bandwidth</li>\r\n								<li class=\"disabled\"><i class=\"fa fa-times-circle\"></i> Full Statistics</li>\r\n\r\n							</ul>\r\n							<div class=\"pricing_btn text-center m-top-40\">\r\n								<a href=\"\" class=\"btn btn-primary\">CHOOSE PLAN</a>\r\n							</div>\r\n						</div>\r\n					</div>\r\n				</div>\r\n				<!-- End off col-md-4 -->\r\n\r\n				<div class=\"col-md-4 col-sm-12\">\r\n					<div class=\"pricing_item sm-m-top-30\">\r\n						<div class=\"pricing_top_border\"></div>\r\n						<div class=\"pricing_head p-top-30 p-bottom-100 text-center\">\r\n							<h3 class=\"text-uppercase\">PREMIUM</h3>\r\n						</div>\r\n						<div class=\"pricing_price_border text-center\">\r\n							<div class=\"pricing_price\">\r\n								<h3 class=\"text-white\">$39</h3>\r\n								<p class=\"text-white\">per month</p>\r\n							</div>\r\n						</div>\r\n\r\n						<div class=\"pricing_body bg-white p-top-110 p-bottom-60\">\r\n							<ul>\r\n								<li><i class=\"fa fa-check-circle text-primary\"></i> <span>50</span> user</li>\r\n								<li><i class=\"fa fa-check-circle text-primary\"></i> Unlimited Bandwidth</li>\r\n								<li class=\"disabled\"><i class=\"fa fa-times-circle\"></i> Full Statistics</li>\r\n							</ul>\r\n							<div class=\"pricing_btn text-center m-top-40\">\r\n								<a href=\"\" class=\"btn btn-primary\">CHOOSE PLAN</a>\r\n							</div>\r\n						</div>\r\n					</div>\r\n				</div>\r\n				<!-- End off col-md-4 -->\r\n\r\n				<div class=\"col-md-4 col-sm-12\">\r\n					<div class=\"pricing_item sm-m-top-30\">\r\n						<div class=\"pricing_head p-top-30 p-bottom-100 text-center\">\r\n							<h3 class=\"text-uppercase\">bUSINESS</h3>\r\n						</div>\r\n						<div class=\"pricing_price_border text-center\">\r\n							<div class=\"pricing_price\">\r\n								<h3 class=\"text-white\">$99</h3>\r\n								<p class=\"text-white\">per month</p>\r\n							</div>\r\n						</div>\r\n\r\n						<div class=\"pricing_body bg-white p-top-110 p-bottom-60\">\r\n							<ul>\r\n								<li><i class=\"fa fa-check-circle text-primary\"></i> Unlimited Users</li>\r\n								<li><i class=\"fa fa-check-circle text-primary\"></i> Unlimited Bandwidth</li>\r\n								<li><i class=\"fa fa-check-circle text-primary\"></i> Full Statistics</li>\r\n							</ul>\r\n							<div class=\"pricing_btn text-center m-top-40\">\r\n								<a href=\"\" class=\"btn btn-primary\">CHOOSE PLAN</a>\r\n							</div>\r\n						</div>\r\n					</div>\r\n				</div>\r\n				<!-- End off col-md-4 -->\r\n			</div>\r\n			<!--End off row-->\r\n		</div>\r\n		<!--End off container -->\r\n	</section>\r\n	<section id=\"skill\" class=\"skill roomy-50\">\r\n		<div class=\"container\">\r\n			<div class=\"row\">\r\n				<div class=\"skill_bottom_content text-center\">\r\n					<div class=\"col-md-3\">\r\n						<div class=\"skill_bottom_item\">\r\n							<h2 class=\"statistic-counter\">3468</h2>\r\n							<div class=\"separator_small\"></div>\r\n							<h5><em>Projects Finished</em></h5>\r\n						</div>\r\n					</div>\r\n					<div class=\"col-md-3\">\r\n						<div class=\"skill_bottom_item\">\r\n							<h2 class=\"statistic-counter\">4638</h2>\r\n							<div class=\"separator_small\"></div>\r\n							<h5><em>Happy Clients</em></h5>\r\n						</div>\r\n					</div>\r\n					<div class=\"col-md-3\">\r\n						<div class=\"skill_bottom_item\">\r\n							<h2 class=\"statistic-counter\">3468</h2>\r\n							<div class=\"separator_small\"></div>\r\n							<h5><em>Hours of work</em></h5>\r\n						</div>\r\n					</div>\r\n					<div class=\"col-md-3\">\r\n						<div class=\"skill_bottom_item\">\r\n							<h2 class=\"statistic-counter\">3468</h2>\r\n							<div class=\"separator_small\"></div>\r\n							<h5><em>Cup of coffee</em></h5>\r\n						</div>\r\n					</div>\r\n				</div>\r\n			</div>\r\n			<!--End off row-->\r\n		</div>\r\n	</section>', 1, '2022-10-20 07:04:25', '2022-10-25 06:06:01'),
(2, 0, 'Privacy Policy', 'privacy-policy', '<section class=\"section roomy-60\">\r\n		<div class=\"container\">\r\n			<h1 class=\"text-center font-weight-bold\">Privacy Policy</h1>\r\n			<p>The following terms and conditions (the \"Agreement\") govern all use of the Comapny.com website (the \"Site\"), Comapny app (the \"mobile app\") and the products and services available on the Site and mobile app. The products and service available at the Site and Mobile app is owned and operated by Company Pvt Ltd (\"Company\"). The Service is offered subject to your (the \"User\") acceptance without modification of all of the terms and conditions contained herein and all other operating rules, policies and procedures that may be published from time to time on the Site and Mobile App by Company.\r\n				BY USING OR ACCESSING ANY PART OF THE SERVICE, YOU AGREE TO ALL OF THE TERMS AND CONDITIONS CONTAINED HEREIN; IF YOU NOT AGREE, DO NOT USE OR ACCESS THE SERVICE.\r\n				Company reserves the right, at its sole discretion, to modify or replace any of the terms or conditions of this Agreement at any time. It is User\'s responsibility to check this Agreement periodically for changes. User\'s continued use of the Service following the posting of any changes to this Agreement constitutes acceptance of those changes. Certain services available at the Site may be subject to additional terms and conditions. To the extent such terms and conditions conflict with this Agreement, such additional terms and conditions shall control.\r\n			</p>\r\n			<h4>\r\n				<label>1. Access</label>\r\n			</h4>\r\n			<p>User certifies to Company that User is at least 18 years of age. User also certifies that it is legally permitted to use the Service, and takes full responsibility for the selection and use of the the Service. This Agreement is void where prohibited by law, and the right to access the Service is revoked in such jurisdictions.</p>\r\n			<h4>\r\n				<label>2. Booking on the Mobile App</label>\r\n			</h4>\r\n			<p>The Mobile App allows users to book activities and experiences (each an \"Experience\") with independent activity/service providers. When booking an Experience, User will have to provide certain identifying information (such as telephone number and/or email address) that will be used by us to confirm User\'s identity prior to participation in the Experience. Once booked, Company will provide User with an e-mail confirmation.\r\n				THE ACTIVITY/SERVICE PROVIDERS REFERENCED THROUGH THE MOBILE APP/SITE ARE INDEPENDENT CONSULTANTS AND NOT AGENTS OR EMPLOYEES OF COMPANY. COMPANY IS NOT LIABLE FOR THE ACTS, ERRORS, OMISSIONS, REPRESENTATIONS, WARRANTIES, BREACHES OR NEGLIGENCE OF ANY SUCH SUPPLIERS OR FROM ANY PERSONAL INJURIES, DEATH, PROPERTY DAMAGE, OR OTHER DAMAGES OR EXPENSES RESULTING THEREFROM.\r\n				By making a purchase through Comapny you agree to receive our experience email (with new experiences and offers). If you do not want to receive such emails, please let us know at support@Comapny.com .</p>\r\n			<h4>\r\n				<label>3. Term of Sale</label>\r\n			</h4>\r\n			<p>Products and services available at the Site/Mobile App are subject to the Company\'s Terms of Sale and Refund Policy which are listed as follows.</p>\r\n			<ul>\r\n				<li>No refunds will be provided after the occurrence of a scheduled Experience, whether or not User actually participated in the Trip.</li>\r\n				<li>Refunds on cancellations of an Experience made prior to the day of scheduled Experience, as listed in User\'s e-mail confirmation, will be subject to additional terms and conditions related to the specific Experience. These additional terms and conditions may vary for each Experience.</li>\r\n				<li>All changes to the date or time of a scheduled Experience are subject to the Activity/Service Provider\'s availability. If there is no availability, User may still have the right to cancel and receive a refund based on applicable terms and conditions for refund.</li>\r\n			</ul>\r\n			<h4>\r\n				<label>4. Tax Payments</label>\r\n			</h4>\r\n			<p>User is responsible for paying any governmental taxes imposed on its use of the Service, including, but not limited to, sales, use, value-added or GST taxes. To the extent Company is obligated to collect such taxes, the applicable tax will be added to User\'s billing account.</p>\r\n			<h4>\r\n				<label>5. Disputes</label>\r\n			</h4>\r\n			<p>USER AGREES TO SUBMIT ANY DISPUTES REGARDING ANY CHARGE TO USER\'S ACCOUNT IN WRITING TO COMPANY WITHIN THIRTY (30) DAYS OF SUCH CHARGE, OTHERWISE SUCH DISPUTE WILL BE WAIVED AND SUCH CHARGE WILL BE FINAL AND NOT SUBJECT TO CHALLENGE. USER ALSO AGREES TO ATTEMPT IN GOOD FAITH TO RESOLVE ANY SUCH DISPUTE DIRECTLY WITH COMPANY PRIOR TO RESORTING TO ANY ALTERNATE REMEDY OR DISPUTE RESOLUTION MECHANISM, INCLUDING WITHOUT LIMITATION ISSUING A CHARGEBACK REQUEST TO USER\'S PAYMENT PROVIDER.</p>\r\n			<h4>\r\n				<label>6. Content</label>\r\n			</h4>\r\n			<p>User agrees that all content and materials (collectively, \"Content\") delivered via the Service or otherwise made available by Company at the Site/Mobile App are protected by copyrights and other proprietary rights and laws. Except as expressly authorized by Company in writing, User agrees not to sell, license, rent, modify, distribute, copy, reproduce, transmit, publicly display, publicly perform, publish, adapt, edit or create derivative works from such materials or content. Reproducing, copying or distributing any content, materials or design elements on the Site for any other purpose is strictly prohibited without the express prior written permission of Company.</p>\r\n			<p>In addition, the Service may enable User to share content or information with other users or with Company (for example, through reviews or other communications channels). User agrees not to use these features to upload, email, post, publish or otherwise transmit any Content that: (i) violates any restriction set forth herein or (ii) is commercial in nature (unless specifically authorized by Company). Company reserves the right to remove, without notice, any content or information which Company determines, in its sole discretion, does not comply with these requirements.</p>\r\n			<p>By uploading, emailing, posting, publishing or otherwise transmitting Content to any area of the Service, or by submitting any Content or feedback (including, without limitation, suggestions, complaints, ideas, results, modifications, improvements, translations, discoveries and observations) to Company (\"Submissions\") by any means, User automatically grants Company a worldwide, royalty-free, non-exclusive, perpetual, sublicensable, right and license to use, reproduce, modify, adapt, create derivative works of, perform, display, distribute, publish, and transmit such Submissions in any form, medium, or technology now known or later developed, provided that such use shall be limited to use in connection with the Service and subject to the restrictions stated in Company\'s Privacy Policy.</p>\r\n			\r\n			<h4>\r\n				<label>7. Travel Considerations</label>\r\n			</h4>\r\n			<p>BY INFORMING USER OF OR FACILITATING ANY ARRANGEMENTS INVOLVING ANY PARTICULAR DESTINATIONS OR ACTIVITIES, COMPANY DOES NOT REPRESENT OR WARRANT THAT TRAVEL TO THOSE DESTINATIONS OR PARTICIPATION IN THOSE ACTIVITIES IS ADVISABLE OR WITHOUT RISK. INFORMING USER OF SPECIFIC RISKS ASSOCIATED WITH PARTICULAR DESTINATIONS OR ACTIVITIES, DOES NOT CONSTITUTE A REPRESENTATION OR WARRANTY THAT THERE ARE NOT OTHER RISKS ASSOCIATED WITH THOSE DESTINATIONS. USER ACKNOWLEDGES AND AGREES THAT THE COMPANY IS NOT LIABLE FOR ANY DAMAGES OR LOSSES (INCLUDING BUT NOT LIMITED TO ANY PROPERTY DAMAGE, THEFT, PERSONAL INJURY, ILLNESS, OR DEATH) THAT MAY OCCUR DURING OR RESULT FROM ANY TRAVEL OR ASSOCIATED ACTIVITIES. USER WILL BE IN THE BEST POSITION TO EVALUATE CURRENT CONDITIONS AND DETERMINE THE RELATIVE SAFETY AND WISDOM OF USER\'S ACTIONS WHILE TRAVELLING AND USER MUST USE INDEPENDENT JUDGEMENT AND CAUTION WHEN CHOOSING WHETHER TO PARTICIPATE IN PARTICULAR ACTIVITIES.</p>\r\n			<h4>\r\n				<label>8. Warranty Disclaimer</label>\r\n			</h4>\r\n			<p>THE SERVICE IS PROVIDED ON AN \"AS IS\" BASIS, WITHOUT WARRANTIES OF ANY KIND, EITHER EXPRESS OR IMPLIED, INCLUDING, WITHOUT LIMITATION, IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE OR NON-INFRINGEMENT. COMPANY MAKES NO WARRANTY THAT THE RESULTS OF USING THE SERVICE WILL MEET USER\'S REQUIREMENTS.</p>\r\n			<h4>\r\n				<label>9. Limitation of Liability</label>\r\n			</h4>\r\n			<p>IN NO EVENT SHALL COMPANY, ITS OFFICERS, DIRECTORS, EMPLOYEES, AGENTS, VENDORS OR SUPPLIERS BE LIABLE UNDER CONTRACT, TORT, STRICT LIABILITY, NEGLIGENCE OR ANY OTHER LEGAL THEORY WITH RESPECT TO THE SERVICE: (I) FOR ANY LOST PROFITS OR SPECIAL, INDIRECT, INCIDENTAL, PUNITIVE, OR CONSEQUENTIAL DAMAGES OF ANY KIND WHATSOEVER, EVEN IF FORESEEABLE, (II) FOR ANY BUGS, VIRUSES, TROJAN HORSES, OR THE LIKE (REGARDLESS OF THE SOURCE OF ORIGINATION).</p>\r\n			<p>IN ADDITION, COMPANY SHALL NOT BE LIABLE FOR ANY LOSS OR LIABILITY RESULTING, DIRECTLY OR INDIRECTLY, FROM USER\'S INABILITY TO ACCESS OR OTHERWISE USE THE SITE/MOBILE APP (INCLUDING, WITHOUT LIMITATION, ANY DELAYS OR INTERRUPTIONS DUE TO ELECTRONIC OR MECHANICAL EQUIPMENT FAILURES, DENIAL OF SERVICE ATTACKS, DATE DATA PROCESSING FAILURES, TELECOMMUNICATIONS OR INTERNET PROBLEMS OR UTILITY FAILURES. THE FOREGOING LIMITATIONS SHALL NOT APPLY TO THE EXTENT PROHIBITED BY APPLICABLE LAW.</p>\r\n			<h4>\r\n				<label>10. Privacy</label>\r\n			</h4>\r\n			<p>Company\'s current privacy policy is available at the Site/Mobile App (the \"Privacy Policy\"). Company strongly recommends that you review the Privacy Policy closely.</p>\r\n			<h4>\r\n				<label>11. Loyalty Policy</label>\r\n			</h4>\r\n			<p>GLocal is introducing the Loyalty Feature to increase the user enagement on the Comapny Application. Under this feature, a user will be rewarded some points on doing certain activities. These activities can be Creating a Post, Contacting the Driver, Inviting friends etc. Adding or removing the activities are subject to the company decision which can be done without any notification.</p>\r\n			<p>A user will only be able to redeem the points into equivalent amount (INR) or redeemables when he crosses the threshold. The configurations and conditons related to the Loyalty Features are subject to the Company Decision and can be totaly removed, amended or edited without prior notice</p>\r\n			<h5>Loyalty Rules</h5>\r\n			<h6>Earning Points</h6>\r\n			<ol type=\"A\" style=\"font-weight: bold;\">\r\n				<li style=\"font-weight: bold;\">Create Post:</li>\r\n				<ol type=\"1\" style=\"font-weight: bold;\">\r\n					<li style=\"font-weight: normal;\">User will only be able to earn certain points on creating a fresh post not the derived one. Derived posts means the posts created from the previous posts for instance, Duplicating the Posts, Editing the Posts, Repeating the post for the next day. </li>\r\n					<li style=\"font-weight: normal;\">User will only be given limited chances to earn points through creating the posts. These chances will be depending upon the configurations made at the discretion and decision of Comapny, with no rights to be claimed by anyone for or against the policies framed time to time.</li>\r\n					<li style=\"font-weight: normal;\">User can avail these chances under a certain exipiry date. After the expiration of the chances, new earning chances will be alloted with a new expiry date. </li>\r\n					<li style=\"font-weight: normal;\">On the exhaustion of the chances, user can still create the post but will not be able to earn the points untill the next allocation.</li>\r\n					<li style=\"font-weight: normal;\">User will be notified through Push Notifications, Notification Screen and Account History for the point earned on creating the post. </li>\r\n				</ol>\r\n				<li style=\"font-weight: bold;\">Contact Service Provider</li>\r\n				<ol type=\"1\" style=\"font-weight: bold;\">\r\n					<li style=\"font-weight: normal;\">User will only be able to earn certain points on contacting the service provider. Points will be alloted on the basis of unique items in the search results. For instance, if somebody tries to contact more than 1 time on the same search result, then that user would not get the points.</li>\r\n					<li style=\"font-weight: normal;\">User will only be given limited chances to earn points through Contacts. These chances will be depending upon the configurations made at the discretion and decision of Comapny, with no rights to be claimed by anyone for or against the policies framed time to time. </li>\r\n					<li style=\"font-weight: normal;\">User can avail these chances under a certain exipiry date. After the expiration of the chances, new earning chances will be alloted with a new expiry date. </li>\r\n					<li style=\"font-weight: normal;\">On the exhaustion of the chances, user can still search and contact the service providers but will not be able to earn the points untill next allocation.</li>\r\n					<li style=\"font-weight: normal;\">User will be notified through Push Notifications, Notification Screen and Account History for the point earned on contacting the service providers. </li>\r\n				</ol>\r\n				<li style=\"font-weight: bold;\">Invite Friends</li>\r\n				<ol type=\"1\" style=\"font-weight: bold;\">\r\n					<li style=\"font-weight: normal;\">User will only be able to earn certain points on inviting to their friends. </li>\r\n					<ol type=\"1.1\" style=\"font-weight: bold;\">\r\n						<li style=\"font-weight: normal;\">Both Inviter and Invitee would earn points. </li>\r\n						<li style=\"font-weight: normal;\">Invite code can be applied once for each unique user.</li>\r\n					</ol>\r\n					<li style=\"font-weight: normal;\">User can be given Limited or Unlimited chances to share their invite code. To make the Invite Code application limited or unlimited is solely on the company decision.</li>\r\n					<li style=\"font-weight: normal;\">User will be notified through Push Notifications, Notification Screen and Account History for the point earned on Inviting the friends.</li>\r\n				</ol>\r\n				<li>\r\n					<figure style=\"margin-bottom:0px;font-weight: bold;\">Gifting Points</figure>\r\n					<figcaption style=\"font-weight: normal;\">Gift points and policies may vary time to time based on the user type, user demography, user engagement and loyalty. Users do not hold right to claim any differential points by virtue of auch policy decision or changes made by Comapny management. </figcaption>\r\n				</li>\r\n				<li>\r\n					<figure style=\"margin-bottom:0px; font-weight: bold;\">Force Redemption</figure>\r\n					<figcaption style=\"font-weight: normal;\">In the circumstances of finding mischivious activities, unreasonable point earning or violation of Loyalty Rules would lead to the forceful redemption under which the company will nullify the current point balance without prior notification however the user will be notified after the force redemption is conducted from the company side. </figcaption>\r\n				</li>\r\n			</ol>\r\n			<p>For futher information please write us at <a href=\"mailto:mail@company.com\" style=\"color:blue;text-decoration: underline;\">mail@company.com</a></p>\r\n			\r\n			<h4>\r\n				<label>12. Copyright</label>\r\n			</h4>\r\n			<p>All content included on the Site, such as text, graphics, logos, button icons, images, audio clips, digital downloads, data compilations, and software, is the property of Company or its content suppliers and protected by international copyright laws. The compilation of all content on the Site is the exclusive property of Company and protected by international copyright laws.</p>\r\n			<p>All software used on (or provided through) the Site is the property of Company or its software suppliers and protected by international copyright laws.</p>\r\n			<h4>\r\n				<label>Privacy policy:</label>\r\n			</h4>\r\n			<p>Company Pvt Ltd (Company) knows that you care about how your personal information is used and shared, and we take your privacy seriously. Please read the following to learn more about our privacy policy. By visiting and using the Comapny Mobile App(a product of Company Pvt Ltd) website and domain name, or otherwise accessing any other linked pages, features, content, or services offered from time to time by Company in connection therewith (collectively, the Website), you acknowledge that you accept the practices and policies outlined in this Privacy Policy.</p>\r\n			<h4>\r\n				<label>What personal information does Company collect?</label>\r\n			</h4>\r\n			<p>The information we gather from customers enables us to personalize and improve our services. We collect the following types of information from our customers</p>\r\n			<h4>\r\n				<label>PERSONAL INFORMATION YOU PROVIDE TO US:</label>\r\n			</h4>\r\n			<p>We may receive and store any information you enter on our Mobile App and/or website or provide to us in any other way. The types of Personal Information collected include your full name, email address, IP address, country of residence, username, password, historical purchase data and any other information necessary for us to provide our services. The Personal Information you provide may be used for such purposes as responding to your requests for certain services, customizing the content you see, and communicating with you about new services.</p>\r\n			<h4>\r\n				<label>FINANCIAL INFORMATION:</label>\r\n			</h4>\r\n			<p>We may have access to certain financial information you provide to us through the Website, such as your payment method (valid credit card number, type, expiration date or other financial information) that information is collected and stored by our third party payment processing company (the Payment Processor), which may in turn provide us with a secured portion of your financial information in order to complete transactions made through the Website. You acknowledge that the use and storage of your financial information is governed by the Payment Processors applicable terms of service and privacy policy.</p>\r\n			<p>Will company share any of the personal information it receives?</p>\r\n			<p>Personal Information about our customers is an integral part of our business. We neither rent nor sell your Personal Information to anyone. We share your Personal Information only as described below.</p>\r\n			<p>Greeters/Local Experts: We need to share your information with them to provide products or services to you. Unless we tell you differently, Company’s greeters/local experts do not have any right to use Personal Information we share with them beyond what is necessary to assist us. You hereby consent to our sharing of Personal Information for the above purposes.</p>\r\n			<p>Financial Information: As stated above, we may have access to a secured portion of your financial information, which is collected and stored by our Payment Processor. We may from time to time request and receive some of your financial information from our Payment Processor for the purposes of completing transactions you have initiated through the Website.</p>\r\n			<p>Business Transfers: In some cases, we may choose to buy or sell assets. In these types of transactions, customer information is typically one of the business assets that are transferred. Moreover, if Company, or substantially all of its assets were acquired, or in the unlikely event that Company goes out of business or enters bankruptcy, customer information would be one of the assets that is transferred or acquired by a third party. You acknowledge that such transfers may occur, and that any acquirer of Company may continue to use your Personal Information as set forth in this policy.</p>\r\n			<p>Protection of Company and Others: We may release Personal Information when we believe in good faith that release is necessary to comply with the law; enforce or apply our conditions of use and other agreements; or protect the rights, property, or safety of Company, our employees, our users, or others. This includes exchanging information with other companies and organizations for fraud protection and credit risk reduction.</p>\r\n			<p>With Your Consent: Except as set forth above, you will be notified when your Personal Information may be shared with third parties, and will be able to prevent the sharing of this information. Is personal information about me secure? Company endeavours to protect user information to ensure that user account information is kept private, however, Company cannot guarantee the security of user account information. Unauthorized entry or use, hardware or software failure, and other factors, may compromise the security of user information at any time. What choices do I have? You may request deletion of your Company account by sending an e-mail to mail@company.com. Please note that some information may remain in our records after deletion of your account. Changes to this privacy policy Company may amend this Privacy Policy from time to time. Use of information we collect now is subject to the Privacy Policy in effect at the time such information is used. If we make changes in the way we use Personal Information, we will notify you by posting an announcement on our Website or sending you an email. Users are bound by any changes to the Privacy Policy when he or she uses the Website after such changes have been first posted.</p>\r\n		</div>\r\n	</section>', 1, '2022-10-21 01:33:12', '2022-10-21 07:08:44'),
(3, 0, 'About', 'about', '<section id=\"about\" class=\"about roomy-60\">\r\n		<div class=\"container\">\r\n			<div class=\"row\">\r\n				<div class=\"main_about\">\r\n					<div class=\"col-md-6\">\r\n						<div class=\"about_content\">\r\n							<h2>ABOUT US</h2>\r\n							<div class=\"separator_left\"></div>\r\n							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>\r\n							<div class=\"about_btns m-top-40\">\r\n								<a href=\"\" class=\"btn btn-primary\">DOWNLOAD NOW</a>\r\n							</div>\r\n						</div>\r\n					</div>\r\n					<div class=\"col-md-6\">\r\n						<div class=\"about_accordion wow fadeIn\">\r\n							<div id=\"faq_main_content\" class=\"faq_main_content\">\r\n								<h6><i class=\"fa fa-angle-right\"></i> UNIQUE DESIGN </h6>\r\n								<div>\r\n									<div class=\"content\">\r\n										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, </p>\r\n									</div>\r\n								</div>\r\n								<h6 class=\"open\"><i class=\"fa fa-angle-right\"></i> EXPERIENCE TEAM</h6>\r\n								<div class=\"open\">\r\n									<div class=\"content\">\r\n										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, </p>\r\n									</div>\r\n								</div>\r\n								<h6> <i class=\"fa fa-angle-right\"></i> GREAT SERVICE </h6>\r\n								<div>\r\n									<div class=\"content\">\r\n										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, </p>\r\n									</div>\r\n								</div>\r\n								<h6><i class=\"fa fa-angle-right\"></i> FREE UPDATES </h6>\r\n								<div>\r\n									<div class=\"content\">\r\n										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, </p>\r\n									</div>\r\n								</div>\r\n							</div>\r\n						</div>\r\n					</div>\r\n				</div>\r\n			</div>\r\n			<!--End off row-->\r\n		</div>\r\n		<!--End off container -->\r\n		<br>\r\n		<br>\r\n		<br>\r\n		<br>\r\n		<hr>\r\n		<br>\r\n		<br>\r\n		<div class=\"container\">\r\n			<div class=\"row\">\r\n				<div class=\"about_bottom_content\">\r\n					<div class=\"col-md-4\">\r\n						<div class=\"about_bottom_item m-top-20\">\r\n							<div class=\"ab_head\">\r\n								<div class=\"ab_head_icon\">\r\n									<i class=\"icofont icofont-fire-burn\"></i>\r\n								</div>\r\n								<h6 class=\"m-top-20\"> WE’RE CREATIVE</h6>\r\n							</div>\r\n							<p class=\"m-top-20\">Lorem ipsum dolor sit amet, consectetuer adipiscing ealit, sed diaim nonummy nibsih euismod tincidiunt laorieet doloire magna diam aliquafm erat voluitpati. </p>\r\n						</div>\r\n					</div>\r\n					<div class=\"col-md-4\">\r\n						<div class=\"about_bottom_item m-top-20\">\r\n							<div class=\"ab_head\">\r\n								<div class=\"ab_head_icon\">\r\n									<i class=\"icofont icofont-speech-comments\"></i>\r\n								</div>\r\n								<h6 class=\"m-top-20\">WE\'RE FRIENDLY</h6>\r\n							</div>\r\n							<p class=\"m-top-20\">Lorem ipsum dolor sit amet, consectetuer adipiscing ealit, sed diaim nonummy nibsih euismod tincidiunt laorieet doloire magna diam aliquafm erat voluitpati. </p>\r\n						</div>\r\n					</div>\r\n					<div class=\"col-md-4\">\r\n						<div class=\"about_bottom_item m-top-20\">\r\n							<div class=\"ab_head\">\r\n								<div class=\"ab_head_icon\">\r\n									<i class=\"icofont icofont-heart\"></i>\r\n								</div>\r\n								<h6 class=\"m-top-20\">WE LOVE MINIMALISM</h6>\r\n							</div>\r\n							<p class=\"m-top-20\">Lorem ipsum dolor sit amet, consectetuer adipiscing ealit, sed diaim nonummy nibsih euismod tincidiunt laorieet doloire magna diam aliquafm erat voluitpati. </p>\r\n						</div>\r\n					</div>\r\n				</div>\r\n			</div>\r\n		</div>\r\n	</section>', 1, '2022-10-21 06:59:49', '2022-10-21 06:59:49'),
(4, 0, 'Contact', 'contact', '<div class=\"main_maps text-center fix\">\r\n		<div class=\"overlay\"></div>\r\n		<div class=\"maps_text\">\r\n			<h3 class=\"text-white\" onclick=\"showmap()\">FIND US ON THE MAP <i class=\"fa fa-angle-down\"></i></h3>\r\n			<div id=\"map_canvas\" class=\"mapheight\"></div>\r\n		</div>\r\n	</div>', 1, '2022-10-21 07:05:00', '2022-10-24 01:14:36');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `name`, `mobile`, `message`, `created_at`, `updated_at`) VALUES
(1, 'test', '8290027571', 'djdjdj', '2022-10-24 01:22:25', '2022-10-24 01:22:25'),
(2, 'djdj', '8290027571', 'jkdjkdjkd', '2022-10-24 01:26:53', '2022-10-24 01:26:53'),
(3, 'dkjdkj', '8290027571', 'jdjdj', '2022-10-24 01:27:21', '2022-10-24 01:27:21'),
(4, 'jkjdjk', '8290027271', 'dd', '2022-10-24 01:29:55', '2022-10-24 01:29:55');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2022_09_14_123105_create_otp_verifications_table', 2),
(11, '2022_09_16_050957_create_user_devices_table', 3),
(12, '2021_03_17_164347_create_roles_table', 4),
(13, '2021_03_17_164650_create_role_user_pivot_table', 4),
(14, '2021_10_22_093630_create_default_role', 5),
(15, '2022_09_26_120742_create_notifications_table', 6),
(16, '2022_10_20_113208_create_cms_pages_table', 7),
(18, '2022_10_24_060456_create_inquiries_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `message`, `image`, `status`, `created_at`, `updated_at`) VALUES
(3, 'testing three', 'tesging three', NULL, 1, '2022-09-29 00:19:03', '2022-09-29 00:19:03'),
(4, 'testing four', 'tesging four', NULL, 1, '2022-09-29 00:20:14', '2022-09-29 00:20:14'),
(5, 'Test', 'Test', NULL, 0, '2022-10-19 01:37:22', '2022-10-19 01:45:02');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('1777cb5bf792d076c928f427f93052ffb12faf08a541261cde718e611973ddb61550f8f8cdab069b', 7, 1, 'mobile', '[]', 0, '2022-09-23 00:58:21', '2022-09-23 00:58:21', '2022-09-25 06:28:21'),
('42a418c9db8337e96fabb3c0315c73eb5b03a9bfb7e2c9d98f3e6a1266a63d803a6c71f272821ccc', 3, 1, 'mobile', '[]', 0, '2022-09-22 05:58:08', '2022-09-22 05:58:10', '2022-09-24 11:28:08'),
('590f404fda4f3faced13aae86d091c97028c7e758b0a2f64a2342fa975e54d151994a3c40444e819', 3, 1, 'mobile', '[]', 0, '2022-09-22 06:02:04', '2022-09-22 06:02:04', '2022-09-24 11:32:04'),
('5bdc556de15b79eb5df35c7dc587d3dccbca5dd32c21e27afa6f7ef35d90671926d02f7bd0a9045a', 3, 1, 'mobile', '[]', 0, '2022-09-22 05:59:30', '2022-09-22 05:59:30', '2022-09-24 11:29:30'),
('644eea68123bcc4acf49c3c75c1d9729d346a39b181c0b6728aec61ab5148968e40498287b27575d', 3, 1, 'mobile', '[]', 0, '2022-09-21 23:57:15', '2022-09-21 23:57:15', '2022-09-22 05:28:15'),
('70e4b86bef1a627055bb2c5ca1d5b036935f81753ba0f1568455bf1244bc14b8ba5db377549c0797', 7, 1, 'mobile', '[]', 0, '2022-09-23 00:29:23', '2022-09-23 00:29:24', '2022-09-25 05:59:23'),
('74646256ffac4ef97a4070c89ea1d247c6f704989fb31a789b511cb1cfc1b8752c7449cb7e824ec6', 7, 1, 'mobile', '[]', 0, '2022-10-13 06:59:34', '2022-10-13 06:59:34', '2022-10-15 12:29:34'),
('790fa9ea76a789b4f7693df419b3a0c8e06ab79aee598385df60ba90069eb2204447d6e436a7d250', 7, 1, 'mobile', '[]', 0, '2022-09-23 00:04:22', '2022-09-23 00:04:24', '2022-09-25 05:34:22'),
('93dd77782608bc1c311ee0bfae9053aa0b671dc9a729a91821b71fc591942b6598b9355f1deed3b3', 3, 1, 'mobile', '[]', 0, '2022-09-22 05:58:49', '2022-09-22 05:58:49', '2022-09-24 11:28:49'),
('9b775fe2a86e032d0e042ae59aefd6d0fc8a582149a02fb583b1bfc79e962f9196710fc2452a0a8f', 7, 1, 'mobile', '[]', 0, '2022-09-23 00:11:16', '2022-09-23 00:11:16', '2022-09-25 05:41:16'),
('9c6897c2373cfb45329cc21094a59020e1afb9408b347ca81b4e0a35f376b9dbdd00a204ef98ac68', 3, 1, 'mobile', '[]', 0, '2022-09-22 06:00:59', '2022-09-22 06:00:59', '2022-09-24 11:30:59'),
('dfd2c68ca67ca6c59d66035bd4f6e53e9ded1ce42bd903e2e78dd4d0ddf6b9e19a158b7a86b327b2', 7, 1, 'mobile', '[]', 0, '2022-09-23 00:10:41', '2022-09-23 00:10:41', '2022-09-25 05:40:41'),
('e5603bf4dfce744e839860dc0fd280626b4e68067c4d9d98c1da228667372ceb7799c83f29a73972', 7, 1, 'mobile', '[]', 0, '2022-09-26 04:59:04', '2022-09-26 04:59:05', '2022-09-28 10:29:04'),
('f3670458a4df9ea5565da32e1ef71298504f57a8987c7d98e248a221c36c8f283598d746eba41224', 3, 1, 'mobile', '[]', 0, '2022-09-22 05:59:40', '2022-09-22 05:59:40', '2022-09-24 11:29:40');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'U0HYbtAMagoiJ4COjWwr0UvVTefhQlbNaq2UJ5RE', NULL, 'http://localhost', 1, 0, 0, '2022-09-14 04:17:35', '2022-09-14 04:17:35'),
(2, NULL, 'Laravel Password Grant Client', 'Z5k2UqCcbwp6UgaRaiQSHG9SFjn0mXKQAmDkZrzu', 'users', 'http://localhost', 0, 1, 0, '2022-09-14 04:17:35', '2022-09-14 04:17:35');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-09-14 04:17:35', '2022-09-14 04:17:35');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otp_verifications`
--

CREATE TABLE `otp_verifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `attribute_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `otp_verifications`
--

INSERT INTO `otp_verifications` (`id`, `user_id`, `attribute_type`, `attribute_value`, `otp`, `created_at`, `updated_at`) VALUES
(9, 3, 'email', 'mohammedaarif358@gmail.com', 5486, '2022-09-16 05:33:00', '2022-09-16 05:33:00'),
(10, 3, 'email', 'mohammedaarif358@gmail.com', 2248, '2022-09-20 06:38:54', '2022-09-20 06:38:54'),
(11, 3, 'email', 'mohammedaarif358@gmail.com', 2760, '2022-09-20 06:58:59', '2022-09-20 06:58:59'),
(12, 3, 'email', 'mohammedaarif358@gmail.com', 4987, '2022-09-20 06:59:38', '2022-09-20 06:59:38'),
(13, 3, 'email', 'mohammedaarif358@gmail.com', 4121, '2022-09-21 01:27:18', '2022-09-21 01:27:18'),
(17, 3, 'email', 'mohammedaarif358@gmail.com', 8970, '2022-09-21 00:38:21', '2022-09-21 02:38:21'),
(18, 3, 'email', 'mohammedaarif358@gmail.com', 4532, '2022-09-21 05:04:14', '2022-09-21 05:04:14'),
(19, 3, 'email', 'mohammedaarif358@gmail.com', 1135, '2022-09-21 05:05:53', '2022-09-21 05:05:53'),
(20, 3, 'email', 'mohammedaarif358@gmail.com', 1821, '2022-09-21 05:06:31', '2022-09-21 05:06:31'),
(21, 3, 'email', 'mohammedaarif358@gmail.com', 2187, '2022-09-21 05:08:27', '2022-09-21 05:08:27'),
(22, 3, 'email', 'mohammedaarif358@gmail.com', 3701, '2022-09-21 05:14:57', '2022-09-21 05:14:57'),
(23, 3, 'email', 'mohammedaarif358@gmail.com', 3137, '2022-09-21 05:17:09', '2022-09-21 05:17:09'),
(24, 3, 'email', 'mohammedaarif358@gmail.com', 2560, '2022-09-21 05:18:46', '2022-09-21 05:18:46'),
(25, 3, 'email', 'mohammedaarif358@gmail.com', 9078, '2022-09-21 05:20:06', '2022-09-21 05:20:06'),
(26, 3, 'email', 'mohammedaarif358@gmail.com', 7112, '2022-09-21 05:20:20', '2022-09-21 05:20:20'),
(27, 3, 'email', 'mohammedaarif358@gmail.com', 6313, '2022-09-21 05:28:23', '2022-09-21 05:28:23'),
(28, 3, 'email', 'mohammedaarif358@gmail.com', 8339, '2022-09-21 05:28:50', '2022-09-21 05:28:50'),
(29, 3, 'email', 'mohammedaarif358@gmail.com', 7248, '2022-09-21 05:29:02', '2022-09-21 05:29:02'),
(30, 3, 'email', 'mohammedaarif358@gmail.com', 6224, '2022-09-21 05:30:14', '2022-09-21 05:30:14');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('mohammedaarif358@gmail.com', '$2y$10$VS/5cDKPaIZTSUFaGrRTTOjEYsUm9qv6Jl4YKhtemYAMCmlIQPoQe', '2022-10-24 23:37:55');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', '2022-09-22 07:45:47', '2022-09-22 07:45:47'),
(2, 'user', 'User', '2022-09-22 07:45:48', '2022-09-22 07:45:48');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`) VALUES
(1, 3),
(2, 7),
(2, 21),
(2, 22);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forgot_password_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `profile_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `email_verified_at`, `password`, `remember_token`, `forgot_password_token`, `status`, `profile_photo`, `created_at`, `updated_at`) VALUES
(3, 'aarif', 'mohammedaarif358@gmail.com', '8290027572', NULL, '$2y$10$NGpWAt257ZFaARqZeijdBe8dWALkeiRn6SRfgi.4c5hI1XbN8TqHe', 'FcLxqfImFGYtxWRBqELE3DRX0RlSS5ytscN7Ikvmu2Gwn5S7qqwafHOTirry', '445ee0827418e7caa226c77bf760e8a0', 1, '20220927053428_63328b6418cde.png', '2022-09-14 04:53:48', '2022-10-20 02:31:45'),
(7, 'mohammad aarif', 'mohammedaarif359@gmail.com', '8290027571', NULL, '$2y$10$od3hJDGm9RBI8PA57XbUIOkHJmW977FKO3ZbCm9CLZ9RSVS.qNcvG', NULL, NULL, 1, NULL, '2022-09-22 05:19:58', '2022-09-22 05:19:58'),
(10, 'manish', 'manishkumar@technoscore.net', '7566301030', NULL, '$2y$10$od3hJDGm9RBI8PA57XbUIOkHJmW977FKO3ZbCm9CLZ9RSVS.qNcvG', NULL, NULL, 1, NULL, '2022-09-22 05:19:58', '2022-09-22 05:19:58'),
(11, 'manish', 'manishkumar1@technoscore.net', '7566301031', NULL, '$2y$10$od3hJDGm9RBI8PA57XbUIOkHJmW977FKO3ZbCm9CLZ9RSVS.qNcvG', NULL, NULL, 1, NULL, '2022-09-22 05:19:58', '2022-09-22 05:19:58'),
(12, 'manish', 'manishkumar2@technoscore.net', '7566301031', NULL, '$2y$10$od3hJDGm9RBI8PA57XbUIOkHJmW977FKO3ZbCm9CLZ9RSVS.qNcvG', NULL, NULL, 1, NULL, '2022-09-22 05:19:58', '2022-09-22 05:19:58'),
(13, 'manish', 'manishkumar3@technoscore.net', '7566301033', NULL, '$2y$10$od3hJDGm9RBI8PA57XbUIOkHJmW977FKO3ZbCm9CLZ9RSVS.qNcvG', NULL, NULL, 1, NULL, '2022-09-22 05:19:58', '2022-09-22 05:19:58'),
(14, 'manish', 'manishkumar4@technoscore.net', '7566301034', NULL, '$2y$10$od3hJDGm9RBI8PA57XbUIOkHJmW977FKO3ZbCm9CLZ9RSVS.qNcvG', NULL, NULL, 1, NULL, '2022-09-22 05:19:58', '2022-09-22 05:19:58'),
(15, 'manish', 'manishkumar5@technoscore.net', '7566301035', NULL, '$2y$10$od3hJDGm9RBI8PA57XbUIOkHJmW977FKO3ZbCm9CLZ9RSVS.qNcvG', NULL, NULL, 1, NULL, '2022-09-22 05:19:58', '2022-09-22 05:19:58'),
(16, 'manish', 'manishkumar6@technoscore.net', '7566301036', NULL, '$2y$10$od3hJDGm9RBI8PA57XbUIOkHJmW977FKO3ZbCm9CLZ9RSVS.qNcvG', NULL, NULL, 1, NULL, '2022-09-22 05:19:58', '2022-09-22 05:19:58'),
(17, 'manish', 'manishkumar7@technoscore.net', '7566301037', NULL, '$2y$10$od3hJDGm9RBI8PA57XbUIOkHJmW977FKO3ZbCm9CLZ9RSVS.qNcvG', NULL, NULL, 1, NULL, '2022-09-22 05:19:58', '2022-09-22 05:19:58'),
(18, 'manish', 'manishkumar8@technoscore.net', '7566301038', NULL, '$2y$10$od3hJDGm9RBI8PA57XbUIOkHJmW977FKO3ZbCm9CLZ9RSVS.qNcvG', NULL, NULL, 1, NULL, '2022-09-22 05:19:58', '2022-09-22 05:19:58'),
(19, 'manish', 'manishkumar9@technoscore.net', '7566301039', NULL, '$2y$10$od3hJDGm9RBI8PA57XbUIOkHJmW977FKO3ZbCm9CLZ9RSVS.qNcvG', NULL, NULL, 1, NULL, '2022-09-22 05:19:58', '2022-09-22 05:19:58'),
(20, 'manish', 'manishkumar0@technoscore.net', '7566301030', NULL, '$2y$10$od3hJDGm9RBI8PA57XbUIOkHJmW977FKO3ZbCm9CLZ9RSVS.qNcvG', NULL, NULL, 1, NULL, '2022-09-22 05:19:58', '2022-09-22 05:19:58'),
(21, 'sakku', 'sakku@gmail.com', '9799809099', NULL, '$2y$10$hPXJB/.99rkHGJG4HvnQ9ecWtSRXgeoQgvoRHkJzqhMbVmb1PI7c.', NULL, NULL, 1, NULL, '2022-10-18 23:08:26', '2022-10-18 23:08:26'),
(22, 'saaku', 'sakku2@gmail.com', '9790809099', NULL, '$2y$10$DeZrfwXEL6Nijn3NLpYZ..Xl5q9sIHoUdVp7u3P.r9WUdrygn9WLC', NULL, NULL, 1, '20221019054005_634f8db526550.jpg', '2022-10-18 23:11:59', '2022-10-19 00:10:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_devices`
--

CREATE TABLE `user_devices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `udid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('ANDROID','IOS') COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_devices`
--

INSERT INTO `user_devices` (`id`, `user_id`, `udid`, `type`, `token`, `status`, `created_at`, `updated_at`) VALUES
(8, 10, NULL, 'ANDROID', 'e5QglIIwSA6QmakG_hNPAF:APA91bEWxGe-NvdGceQK16dYkg8-YuJzN9Z0IyaBEjxgS61hAGCdzicyFLP7p6RkYOD-dh4yqhQJg-cs5bXF0UGRtnBWGT_iMNLYn5lVvBjk2uTZxNAHIK9cksw-xaDeYM147ZoYUeBF', 1, '2022-09-26 11:14:14', '2022-09-26 11:14:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cms_pages_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `otp_verifications`
--
ALTER TABLE `otp_verifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`role_id`,`user_id`),
  ADD KEY `role_user_role_id_index` (`role_id`),
  ADD KEY `role_user_user_id_index` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_devices`
--
ALTER TABLE `user_devices`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `otp_verifications`
--
ALTER TABLE `otp_verifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_devices`
--
ALTER TABLE `user_devices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
