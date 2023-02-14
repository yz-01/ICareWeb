@extends('layouts.app')
@section('content')
    <style>
        ol {
            counter-reset: item
        }
        ol>li {
            /*font-weight: bold;*/
            display: block
        }

        ol>li:before{
            font-weight:bold;
            content: counters(item, ".") " ";
            counter-increment: item
        }

    </style>

    <div class="rbt-overlay-page-wrapper">

        <div class="breadcrumb-image-container breadcrumb-style-max-width">
            <div class="breadcrumb-image-wrapper">
                <img src="assets/images/bg/bg-image-10.jpg" alt="Education Images">
            </div>
            <div class="breadcrumb-content-top text-center">
                <h1 class="title">Term and Conditions</h1>
{{--                <p class="mb--20">Histudy Course Privacy Policy Here.</p>--}}
                <ul class="page-list">
                    <li class="rbt-breadcrumb-item"><a href="/">Home</a></li>
                    <li>
                        <div class="icon-right"><i class="feather-chevron-right"></i></div>
                    </li>
                    <li class="rbt-breadcrumb-item active">Term and Conditions</li>
                </ul>
            </div>
        </div>

        <div class="rbt-putchase-guide-area breadcrumb-style-max-width rbt-section-gapBottom">
            <div class="rbt-article-content-wrapper">
                <div class="content">
                    <p>
                        Thank you for using HRDP!
                    </p>
                    <p>
                       These Terms of Service (“<b>Terms</b>”) are a binding legal agreement between you and HRDP that govern your right to use the websites, applications, and other offerings from HRDP (collectively, the “<b>Human Resource Development Platform</b>”). When used in these Terms, “<b>HRDP</b>,” “<b>we</b>,” “<b>us</b>,” or “<b>our</b>” refers to the HRDP entity set out with whom you are contracting.                    </p>
                    <p>
                        The HRDP Platform offers an online venue that enables users (“ <b>Members</b>”) to publish, offer, search for, collect points, purchase and redeem products services. Members who publish and offer services are “ <b>Merchants</b>” and “ <b>Trainers</b>”, and Members who search for, purchase, redeem or use services are “ <b>Customers.</b>” Merchants and Trainers offer products and services (“ <b>Offerings</b>”). You must register an account to access and use many features of the HRDP Platform, and must keep your account information accurate. As the provider of the HRDP Platform, HRDP does not own, control, offer or manage any Offerings or Trainer Services. HRDP is not a party to the contracts entered into directly between Merchants, Trainers and Customers. HRDP is not acting as an agent in any capacity for any Member, except as specified in the Payments Terms of Service (“ <b>Payment Terms</b>”). To learn more about HRDP’s role see Section 16.
                    </p>
                    <p>
                        We maintain other terms and policies that supplement these Terms like our Privacy Policy, which describes our collection and use of personal data, and our Payments Terms, which govern any payment services provided to Members by the HRDP payment entities (collectively "<b>HRDP Payments</b>").
                    </p>
                    <p>
                        If you are a Merchant or a Trainer, you are responsible for understanding and complying with all laws, rules, regulations and contracts with third parties that apply to your Products and Services.                    </p>

                    <h5>
                        Customer Terms
                    </h5>

                    <ol>
                        <li>
                            <b>Our Mission.</b>
                        </li>
                        <p>
                            Our mission is to provide a space where you can seamlessly enhance your skills and expand your knowledge through access to highly regarded trainers, all while enjoying additional perks and benefits. Our platform offers a vast array of options for you to browse through, ranging from individual trainers to training centers. With millions of offerings available, you are sure to find one that fits your preferred learning style and meets your upskilling needs. Before making a decision, you can familiarize yourself with the offering by reading its detailed description and viewing photos, as well as examining the trainer's profile and the feedback from previous participants.
                        </p>

{{--                        second sub list--}}
                        <li>
                            <b>Searching and Booking on HRDP.</b>
                            <ol>
                                <li>
                                    <b>Searching.</b>
                                </li>
                                <p>
                                    You can search for Trainer Services by using criteria like the type of Trainer Service, training venue and training dates. You can also use filters to refine your search results. Search results are based on their relevance to your search and other criteria. Relevance considers factors like price, availability, Reviews, customer service and cancellation history, popularity, previous training and saved Offerings, Trainer requirements (e.g. minimum or maximum days), and more.                                 </p>

                                <li>
                                    <b>Booking.</b>
                                </li>
                                <p>
                                    When you book a Offering, you are agreeing to pay all charges for your booking including the Offering price, identified applicable fees during checkout (collectively, “<b>Total Price</b>”). You are also agreeing that HRDP via HRDP Payments may charge the Payment Method (as defined in the Payment Terms) used to book the Offering in order to collect Damage Claim (as defined in Section 15) amounts. When you receive the booking confirmation, a contract for Trainer Services (a "<b>Purchase</b>") is formed directly between you and the Trainer. In addition to these Terms, you will be subject to, and responsible for complying with, all terms of the Purchase, including without limitation, the cancellation policy and any other rules, standards, policies, or requirements identified in the Offering or during checkout that apply to the Purchase. It is your responsibility to read and understand these rules, standards, policies, and requirements prior to booking Offering. Be aware that some Trainers work with a co-Trainer or as part of a team to provide their Trainer Services.
                                </p>

                                <li>
                                    <b>Course Purchases.</b>
                                </li>
                                <p>
                                    A Course Purchase is a limited license to participate the Course. The Trainer retains the right to cancel or postpone or extended the duration of the Course, to the extent: (i) it is reasonably necessary, (ii) permitted by your contract with the Trainer, and (iii) consistent with applicable law. Please be advised that the trainer cannot guarantee any specific outcomes or the attendance of the participants. No refunds will be issued in the event that the participant fails to attend the course for any reason. Additionally, in the event that the participant breaches the copyright of the course materials, the trainer reserves the right to take legal action, including pursuing reasonable penalties, and taking the matter to court in accordance with applicable laws.                                </p>

                                <li>
                                   <b> Purchases for Experiences and Other Trainer Services.</b>
                                </li>
                                <p>
                                    An Experience or other Trainer Service Purchase entitles you to participate in, attend, or use that Trainer Service. You are responsible for confirming that you, and anyone you invite, meet minimum age, proficiency, fitness, or other requirements. You are responsible for informing the Trainer of any medical or physical conditions, or other circumstances that may impact your ability to participate, attend, or use the Trainer Service. Except where expressly authorized, you may not allow any person to join a Trainer Service unless they are included as an additional Customer during the booking process.
                                </p>
                            </ol>
                        </li>
{{--                        end of secnd sub list--}}

{{--                        third sub list--}}
                        <br>
                        <li>
                            <b>Cancellations, Travel Issues, Refunds and Booking Modifications.</b>
                            <ol>
                                <li>
                                    <b>Cancellations, Travel Issues, and Refunds.</b>
                                </li>
                                <p>
                                    In general, if as a Customer you cancel a Purchase, the amount refunded to you is determined by the cancellation policy that applies to that Purchase. But, in certain situations, other policies take precedence and determine what amount is refunded to you. If something outside your control forces you to cancel a Purchase, you may be eligible for a partial or full refund under our Extenuating Circumstances Policy. If the Trainer cancels, or you experience a Travel Issue (as defined in our Rebooking and Refund Policy), you may be eligible for rebooking assistance or a partial or full refund under the Rebooking and Refund Policy. Different policies apply to certain categories of Offerings.
                                </p>

                                <li>
                                    <b>Booking Modifications.</b>
                                    <p>
                                        Customers and Trainers are responsible for any booking modifications they agree to make via the HRDP Platform or direct HRDP customer service to make on their behalf ("<b>Booking Modifications</b>"), and agree to pay any additional amounts, fees, or taxes associated with any Booking Modification.
                                    </p>
                                </li>
                            </ol>
                        </li>
{{--                    end of third sub list--}}

{{--                        forth sub list--}}
                        <br>
                        <li>
                            <b>Your Responsibilities and Assumption of Risk.</b>
                            <ol>
                                <li>
                                    <b>Your Responsibilities.</b>
                                </li>
                                <p>
                                    You are responsible and liable for your own acts and omissions and are also responsible for the acts and omissions of anyone you invite to join or provide access to any Course, Experience or other Trainer Service. For example, this means: (i) you are responsible for leaving a Course (and related personal property) in the condition it was in when you arrived, (ii) you are responsible for paying all reasonable Damage Claim amounts necessary to cover damage that you cause to a Course, and (iii) you must act with integrity, treat others with respect, and comply with applicable laws at all times. If you are purchasing for an additional Customer who is a minor or if you bring a minor to a Trainer Service, you must be legally authorized to act on behalf of the minor and you are solely responsible for the supervision of that minor.
                                </p>

                                <li>
                                    <b>Your Assumption of Risk. </b>
                                </li>
                                <p>
                                    <b>
                                        You acknowledge that many activities carry inherent risks and agree that, to the maximum extent permitted by applicable law, you assume the entire risk arising out of your access to and use of the HRDP Platform and any Content (as defined in Section 10), including your stay at any Course, participation in any Experience, use of any other Trainer Service, or any other interaction you have with other Members whether in person or online. This means it is your responsibility to investigate a Trainer Service to determine whether it is suitable for you, and you freely and willfully assume those risks by choosing to participate in those Trainer Services.
                                    </b>
                                </p>
                            </ol>
                        </li>
{{--                        end of forth sub list--}}
                        <br>

                        <h5>
                            Trainer Terms
                        </h5>
{{--                        fifth sub list--}}
                        <li>
                            <b>Trainer and Merchant of HRDP</b>

                            <ol>
                                <li>
                                    <b>Trainer and Merchant.</b>
                                </li>
                                <p>
                                    As a Trainer or a Merchant, HRDP offers you the right to use the HRDP Platform to share your Course, Experience, or other Trainer Service, products with our vibrant community of Customers - and earn money doing it. It’s easy to create an Offering and you are in control of how you Trainer/Merchant - set your price, availability, and rules for each Offering.
                                </p>

                                <li>
                                    <b>Contracting with Customers.</b>
                                </li>
                                <p>
                                    When you accept a booking request, or receive a purchase confirmation of your course through the HRDP Platform, you are entering into a contract directly with the Customer, and are responsible for delivering your Trainer Service under the terms and at the price specified in your Offering. You are also agreeing to pay applicable fees like HRDP’s service fee (and applicable taxes) for each booking. HRDP Payments will deduct amounts you owe from your payout unless we and you agree to a different method. Any terms, policies or conditions that you include in any supplemental contract with Customers must: (i) be consistent with these Terms, our Additional Legal Terms, Policies, and the information provided in your Offering, and (ii) be prominently disclosed in your Offering description.
                                </p>

                                <li>
                                    <b>Independence of Trainers.</b>
                                </li>
                                <p>
                                    Your relationship with HRDP is that of an independent individual or entity and not an employee, agent, joint venturer, or partner of HRDP, except that HRDP Payments acts as a payment collection agent as described in the Payments Terms. HRDP does not direct or control your Trainer Service, and you agree that you have complete discretion whether and when to provide Trainer Services, and at what price and on what terms to offer them.
                                </p>
                            </ol>
                        </li>
{{--                        end of fifth sub list--}}
                        <br>
{{--                        sixth sub list--}}
                        <li>
                            <b>Managing Your Offering.</b>

                            <ol>
                                <li>
                                    <b>Creating and Managing Your Offering.</b>
                                </li>
                                <p>
                                    The HRDP Platform provides tools that make it easy for you to set up and manage an Offering. Your Offering must include complete and accurate information about your Trainer Service, your price, other charges like material fees, resort fees, offline fees, and any rules or requirements that apply to your Customers or Offering. You are responsible for keeping your Offering information (including calendar availability) and content (like photos) up-to-date and accurate at all times. We recommend that you obtain appropriate insurance for your Trainer Services and suggest you carefully review policy terms and conditions including coverage details and exclusions. Any offer of an Experience is subject to our Additional Terms for Experience Trainers.
                                </p>
                                <li>
                                    <b>Know Your Legal Obligations.</b>
                                </li>
                                <p>
                                    You are responsible for understanding and complying with any laws, rules, regulations, and contracts with third parties that apply to your Offering or Trainer Services. For example: Check your local rules to learn what rules apply to the Trainer Services you plan to offer. Information we provide regarding legal requirements is for informational purposes only and you should independently confirm your obligations. You are responsible for handling and using personal data of Customers and others in compliance with applicable privacy laws and these Terms, including our Trainer Privacy Standards. If you have questions about how local laws apply you should always seek legal advice.
                                </p>
                                <li>
                                    <b>Search Ranking. </b>
                                    <br>
                                    <br>
                                    <p>
                                        The ranking of Offerings in search results on the HRDP Platform depends on a variety of factors, including these main parameters:
                                    </p>
                                    <ul>
                                        <li>
                                            Customer search parameters (e.g. time and duration of the course, price range),
                                        </li>
                                        <li>
                                            Offering characteristics (e.g. price, calendar availability, number and quality of images, Reviews, type of Trainer Service, Trainer status, average Customer popularity),
                                        </li>
                                        <li>
                                            Customer booking experience (e.g. customer service and cancellation history of the Trainer, ease of booking),
                                        </li>
                                        <li>
                                            Trainer requirements (e.g. age limitation), and
                                        </li>
                                        <li>
                                            Customer preferences (e.g. previous courses, saved Offerings, location from where the Customer is searching).
                                        </li>
                                    </ul>
                                </li>
                                <br>
                                <p>
                                    Search results may appear different on our mobile application than they appear on our website. HRDP may allow Trainers and Merchants to promote their Offerings in search or elsewhere on the HRDP Platform by paying an additional fee. More information about the factors that determine how your Offering appears in search results.                                </p>

                                <li>
                                    <b>Your Responsibilities.</b>
                                </li>
                                <p>
                                    You are responsible and liable for your own acts and omissions and are also responsible for the acts and omissions of anyone you allow to participate in providing your Trainer Services. You are responsible for setting your price and establishing rules and requirements for your Offering. You must describe any and all fees and charges in your Offering description and may not collect any additional fees or charges outside the HRDP Platform except those expressly authorized by our Offline Fee Policy. Do not encourage Customers to create third-party accounts, submit reviews, provide their contact information, or take other actions outside the HRDP Platform in violation of our Off-Platform Policy.
                                </p>

                                <li>
                                    <b>Training as a Team or Organization.</b>
                                </li>
                                <p>
                                    If you work with a co-Trainer or Trainer as part of a team, business, trainer centre, or other organization, the entity and each individual who participates in providing Trainer Services is responsible and liable as a Trainer under these Terms. If you accept terms or enter into contracts, you represent and warrant that you are authorized to enter into contracts for and bind your team, business or other organization, and that each entity you use is in good standing under the laws of the place where it is established. If you perform other functions, you represent and warrant that you are authorized to perform those functions. If you instruct HRDP to transfer a portion of your payout to a co-Trainer or other Trainers, or to send payments to someone else, you must be authorized to do so, and are responsible and liable for the payment amounts and accuracy of any payout information you provide.
                                </p>

                                <li>
                                    <b>
                                        Your Assumption of Risk.
                                    </b>
                                </li>
                                <p>
                                    <b>
                                        You acknowledge that Training carries inherent risks and agree that you assume the entire risk arising out of your access to and use of the HRDP Platform, offering Trainer Services, or any interaction you have with other Members whether in person or online. You agree that you have had the opportunity to investigate the HRDP Platform and any laws, rules, regulations, or obligations that may be applicable to your Offerings or Trainer Services and that you are not relying upon any statement of law made by HRDP.
                                    </b>
                                </p>
                            </ol>
                        </li>
{{--                        end of sixth sub list--}}
                        <br>
{{--                        seventh sub list--}}
                        <li>
                            <b>Cancellations, Travel Issues, and Booking Modifications.</b>

                            <ol>
                                <li>
                                    <b>Cancellations and Travel Issues.</b>
                                </li>
                                <p>In general, if a Customer cancels a Purchase, the amount paid to you is determined by the cancellation policy that applies to that Purchase. As a Trainer, you should not cancel on a Customer without a valid reason under our Extenuating Circumstances Policy or applicable law. If you cancel on a Customer without such a valid reason, we may impose a cancellation fee and other consequences. If: (i) a Customer experiences a Travel Issue (as defined by the Rebooking and Refund Policy), (ii) an Extenuating Circumstance arises, or (iii) a Purchase is cancelled under Section 13 of these Terms, the amount you are paid will be reduced by the amount we refund or otherwise provide to the Customer, and by any other reasonable costs we incur as a result of the cancellation. If a Customer receives a refund after you have already been paid, or the amount of the refund and other costs incurred by HRDP exceeds your payout, HRDP (via HRDP Payments) may recover that amount from you, including by offsetting the refund against your future payouts. You agree that HRDP’s Rebooking and Refund Policy, Extenuating Circumstances Policy, and these Terms preempt the cancellation policy you set in situations where they allow for the cancellation of a Purchase and/or the issuance of refunds to Customers. If we reasonably expect to provide a refund to a Customer under one of these policies, we may delay release of any payout for that Purchase until a refund decision is made. If you Trainer an Experience please note that the Experience Cancellation Policy, Experiences Customer Refund Policy and different cancellation fees and consequences apply to your Purchases. See each Policy for details about what is covered, and what your payout will be in each situation.</p>

                                <li><b>Booking Modifications</b></li>
                                <p>
                                    Trainers and Customers are responsible for any Booking Modifications they agree to make via the HRDP Platform or direct HRDP customer service to make on their behalf, and agree to pay any additional amounts, fees or taxes associated with a Booking Modification.
                                </p>
                            </ol>
                        </li>
{{--                        end of seventh sub list--}}
                        <br>
{{--                        eight sub list--}}
                        <li>
                            <b>Taxes.</b>
                            <ol>
                                <li>
                                    <b>Trainer Taxes.</b>
                                </li>
                                <p>
                                    As a Trainer, you are responsible for determining and fulfilling your obligations under applicable laws to report, collect, remit, or include in your price any applicable taxes ("<b>Taxes</b>").
                                </p>

                                <li>
                                    <b>Collection and Remittance by HRDP.</b>
                                </li>
                                <p>
                                    In jurisdictions where HRDP facilitates the collection and/or remittance of Taxes on behalf of Trainers, you instruct and authorize HRDP to collect Taxes on your behalf, and/or to remit such Taxes to the relevant Tax authority. Any Taxes that are collected and/or remitted by HRDP are identified to Members on their transaction records, as applicable. HRDP may seek additional amounts from Members (including by deducting such amounts from future payouts) in the event that the Taxes collected and/or remitted are insufficient to fully discharge that Members’ tax obligations, and you agree that your sole remedy for Taxes collected by HRDP is a refund from the applicable Tax authority. You acknowledge and agree that we retain the right, with prior notice to affected Members, to cease the collection and remittance of Taxes in any jurisdiction for any reason.
                                </p>

                                <li>
                                    <b>Tax Information. </b>
                                </li>
                                <p>In certain jurisdictions, Tax regulations may require that we collect and/or report Tax information about you, or withhold Taxes from payouts to you, or both. If you fail to provide us with documentation that we determine to be sufficient to support any such obligation to withhold Taxes from payouts to you, we may withhold payouts up to the amount as required by law, until sufficient documentation is provided. You agree that HRDP may issue on your behalf invoices or similar documentation for VAT, GST, consumption or other Taxes for your Trainer Services to facilitate accurate tax reporting by you, our Customers, and/or their organizations.</p>

                            </ol>
                        </li>
{{--                        end of eight sub list--}}
                        <br>
                        <b>General Terms</b>
                        <br>
{{--                        ninth sub list--}}
                        <li>
                            <b>Reviews.</b>
                        </li>
                        <p>
                            After each Trainer Service, Customers and Trainers will have an opportunity to review each other. Your Review must be accurate and may not contain any discriminatory, offensive, defamatory, or other language that violates our Content Policy or Review Policy. Reviews are not verified by HRDP for accuracy and may be incorrect or misleading.
                        </p>
{{--                        end of ninth sub list--}}
{{--                        tenth sub list--}}
                        <li>
                            <b>Content.</b>
                        </li>
                        <p>
                            Parts of the HRDP Platform enable you to provide feedback, text, photos, audio, video, information, and other content (collectively, “<b>Content</b>”). By providing Content, in whatever form and through whatever means, you grant HRDP a non-exclusive, worldwide, royalty-free, irrevocable, perpetual, sub-licensable and transferable license to copy, modify, prepare derivative works of, distribute, publish and otherwise exploit, that Content, without limitation. If Content includes personal information, our Privacy Policy describes how we use that personal information. Where HRDP pays for the creation of Content or facilitates its creation, HRDP may own that Content, in which case supplemental terms or disclosures will say that. You are solely responsible for all Content that you provide and warrant that you either own it or are authorized to grant HRDP the rights described in these Terms. You are responsible and liable if any of your Content violates or infringes the intellectual property or privacy rights of any third party. Content must comply with our Content Policy and Nondiscrimination Policy, which prohibit, among other things, discriminatory, obscene, harassing, deceptive, violent, and illegal content. You agree that HRDP may make available services or automated tools to translate Content and that your Content may be translated using such services or tools. HRDP does not guarantee the accuracy or quality of translations and Members are responsible for confirming the accuracy of such translations.
                        </p>
{{--                        end of tenth sub list--}}
{{--                        11 sub list--}}
                        <li>
                            <b>Fees.</b>
                        </li>
                        <p>
                            HRDP may charge fees (and applicable Taxes) to Trainers and Customers for the right to use the HRDP Platform. More information about when service fees apply and how they are calculated can be found on our Service Fees page. Except as otherwise provided on the HRDP Platform, service fees are non-refundable. HRDP reserves the right to change the service fees at any time, and will provide Members notice of any fee changes before they become effective. Fee changes will not affect bookings made prior to the effective date of the fee change. If you disagree with a fee change you may terminate this agreement at any time pursuant to Section 13.2.
                        </p>
{{--                        end of 11 sublist--}}
{{--                        12 sublist--}}
                        <li>
                            <b>HRDP Platform Rules.</b>
                            <ol>
                                <li>
                                    <b>Rules.</b>
                                    <br>
                                    <br>
                                    <p>
                                        You must follow these rules and must not help or induce others to break or circumvent these rules.
                                    </p>

                                    <ul>
                                        <li>
                                            Act with integrity and treat others with respect
                                            <ul style="list-style-type: circle;">
                                                <li>
                                                    Do not lie, misrepresent something or someone, or pretend to be someone else.
                                                </li>
                                                <li>
                                                    Be polite and respectful when you communicate or interact with others.
                                                </li>
                                                <li>
                                                    Do not discriminate against or harass others
                                                </li>
                                            </ul>
                                        </li>

                                        <li>
                                            Do not scrape, hack, reverse engineer, compromise or impair the HRDP Platform
                                            <ul style="list-style-type: circle;">
                                                <li>
                                                    Do not use bots, crawlers, scrapers, or other automated means to access or collect data or other content from or otherwise interact with the HRDP Platform.
                                                </li>
                                                <li>
                                                    Do not hack, avoid, remove, impair, or otherwise attempt to circumvent any security or technological measure used to protect the HRDP Platform or Content.
                                                </li>
                                                <li>
                                                    Do not decipher, decompile, disassemble, or reverse engineer any of the software or hardware used to provide the HRDP Platform
                                                </li>
                                                <li>
                                                    Do not take any action that could damage or adversely affect the performance or proper functioning of the HRDP Platform.
                                                </li>
                                            </ul>
                                        </li>

                                        <li>
                                            Only use the HRDP Platform as authorized by these Terms or another agreement with us
                                            <ul style="list-style-type: circle;">
                                                <li>
                                                    You may only use another Member’s personal information as necessary to facilitate a transaction using the HRDP Platform as authorized by these Terms
                                                </li>
                                                <li>
                                                    Do not use the HRDP Platform, our messaging tools, or Members’ personal information to send commercial messages without the recipient’s express consent.
                                                </li>
                                                <li>
                                                    You may use Content made available through the HRDP Platform solely as necessary to enable your use of the HRDP Platform as a Customer or Trainer.
                                                </li>
                                                <li>
                                                    Do not use Content unless you have permission from the Content owner or the use is authorized by us in these Terms or another agreement you have with us.
                                                </li>
                                                <li>
                                                    Do not request, make, or accept a booking or any payment outside of the HRDP Platform to avoid paying fees, taxes or for any other reason.
                                                </li>
                                                <li>
                                                    Do not require or encourage Customers to open an account, leave a review, complete a survey, or otherwise interact, with a third party website, application or service before, during or after a Purchase, unless authorized by HRDP.
                                                </li>
                                                <li>
                                                    Do not engage in any practices that are intended to manipulate our search algorithm.
                                                </li>
                                                <li>
                                                    Do not book Trainer Services unless you are actually using the Trainer Services.
                                                </li>
                                                <li>
                                                    Do not use, copy, display, mirror or frame the HRDP Platform, any Content, any HRDP branding, or any page layout or design without our consent.
                                                </li>
                                            </ul>
                                        </li>

                                        <li>
                                            Honor your legal obligations
                                            <ul style="list-style-type: circle;">
                                                <li>
                                                    Understand and follow the laws that apply to you, including privacy, data protection, and export laws.
                                                </li>
                                                <li>
                                                    If you provide us with someone else’s personal information, you: (i) must do so in compliance with applicable law, (ii) must be authorized to do so, and (iii) authorize us to process that information under our Privacy Policy.
                                                </li>
                                                <li>
                                                    Do not use the name, logo, branding, or trademarks of HRDP or others without permission.
                                                </li>
                                                <li>
                                                    Do not use or register any domain name, social media handle, trade name, trademark, branding, logo, or other source identifier that may be confused with HRDP branding.
                                                </li>
                                                <li>
                                                    Do not offer Trainer Services that violate the laws or agreements that apply to you.
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>

                                    <br>
                                    <li>
                                        <b>Reporting Violations.</b>
                                    </li>
                                <p>If you believe that a Member, Offering or Content poses an imminent risk of harm to a person or property, you should immediately contact local authorities before contacting HRDP. In addition, if you believe that a Member, Offering or Content has violated our Standards, you should report your concerns to HRDP. If you reported an issue to local authorities, HRDP may request a copy of that report. Except as required by law, you agree that we are not obligated to take action in response to any report.</p>

                                <li>
                                    <b>Copyright Notifications.</b>
                                </li>
                                <p>If you believe that Content on the HRDP Platform infringes copyrights, please notify us in accordance with our Copyright Policy.</p>
                            </ol>
{{--                                end of 12 sublist--}}
                            <br>
{{--                                13 sub list--}}
                                <li>
                                    <b>Termination, Suspension and other Measures.</b>

                                    <ol>
                                        <li>
                                            <b>Term.</b>
                                        </li>
                                        <p>
                                            The agreement between you and HRDP reflected by these Terms is effective when you access the HRDP Platform (for example to create an account) and remains in effect until either you or we terminate the agreement in accordance with these Terms.
                                        </p>

                                        <li>
                                            <b>Termination</b>
                                        </li>
                                        <p>
                                            You may terminate this agreement at any time by sending us an email or by deleting your account. HRDP may terminate this agreement and your account for any reason by giving you 30 days’ notice via email or using any other contact information you have provided for your account. HRDP may also terminate this agreement immediately and without notice and stop providing access to the HRDP Platform if you breach these Terms, you violate our Additional Legal Terms, or Policies, you violate applicable laws, or we reasonably believe termination is necessary to protect HRDP, its Members, or third parties. If your account has been inactive for more than two years, we may terminate your account without prior notice.
                                        </p>

                                        <li>
                                            <b>Member Violations.</b>
                                            <br><br>
                                            <p>If you breach these Terms, applicable laws, regulations, or third-party rights, or HRDP believes it is reasonably necessary to protect HRDP, its Members, or third parties; HRDP may, with or without prior notice:</p>

                                            <ul>
                                                <li>
                                                    suspend or limit your access to or use of the HRDP Platform and/or your account;
                                                </li>
                                                <li>
                                                    suspend or remove Offerings, Reviews, or other Content;
                                                </li>
                                                <li>
                                                    cancel pending or confirmed bookings; or
                                                </li>
                                                <li>
                                                    suspend or revoke any special status associated with your account.
                                                </li>
                                            </ul>
                                        </li>
                                        <br>
                                        <p>
                                            For minor violations or where otherwise appropriate as HRDP determines in its sole discretion, you will be given notice of any intended measure by HRDP and an opportunity to resolve the issue. You may appeal actions taken by us under this Section by contacting customer service. If a Purchase is cancelled under this Section, the amount paid to the Trainer will be reduced by the amount we refund or otherwise provide to the Customer, and by any other costs we incur as a result of the cancellation.
                                        </p>

                                        <li>
                                            <b>Legal Mandates.</b>
                                        </li>
                                        <p>
                                            HRDP may take any action it determines is reasonably necessary to comply with applicable law, or the order or request of a court, law enforcement, or other administrative agency or governmental body, including the measures described above in Section 13.3.
                                        </p>

                                        <li>
                                            <b>Effect of Termination. </b>
                                        </li>
                                        <p>
                                            If you are a Trainer and terminate your HRDP account, any confirmed booking(s) will be automatically cancelled and your Customers will receive a full refund. If you terminate your account as a Customer, any confirmed booking(s) will be automatically cancelled and any refund will depend upon the terms of the Purchase’s cancellation policy. When this agreement has been terminated, you are not entitled to a restoration of your account or any of your Content. If your access to or use of the HRDP Platform has been limited, or your HRDP account has been suspended, or this agreement has been terminated by us, you may not register a new account or access or use the HRDP Platform through an account of another Member.
                                        </p>

                                        <li>
                                            <b>Survival</b>
                                        </li>
                                        <p>
                                            Parts of these Terms that by their nature survive termination, will survive termination of this agreement, including Sections 2 through 26.
                                        </p>

                                    </ol>
                                    <br>
                                    <li>
                            <b>Modification</b>
                        </li>
                        <p>
                            HRDP may modify these Terms at any time. When we make material changes to these Terms, we will post the revised Terms on the HRDP Platform and update the “Last Updated” date at the top of these Terms. We will also provide you with notice of any material changes by email at least 30 days before the date they become effective. If you disagree with the revised Terms, you may terminate this agreement immediately as provided in these Terms. If you do not terminate your agreement before the date the revised Terms become effective, your continued access to or use of the HRDP Platform will constitute acceptance of the revised Terms.
                        </p>

                        <li>
                            <b>HRDP’s Role.</b>
                        </li>
                        <p>
                            We offer you the right to use a platform that enables Members to publish, offer, search for, and book Trainer Services. While we work hard to ensure our Members have great experiences using HRDP, we do not and cannot control the conduct of Customers and Trainers. You acknowledge that HRDP has the right, but does not have any obligation, to monitor the use of the HRDP Platform and verify information provided by our Members. For example, we may review, disable access to, remove, or edit Content to: (i) operate, secure and improve the HRDP Platform (including for fraud prevention, risk assessment, investigation and customer support purposes); (ii) ensure Members’ compliance with these Terms; (iii) comply with applicable law or the order or requirement of a court, law enforcement or other administrative agency or governmental body; (iv) address Content that we determine is harmful or objectionable; (v) take actions set out in these Terms; and (vi) maintain and enforce any quality or eligibility criteria, including by removing Offerings that don’t meet quality and eligibility criteria. Members acknowledge and agree that HRDP administers its Additional Legal Terms, Policies and Standards (such as basic requirements for Trainers), including decisions about whether and how to apply them to a particular situation, at its sole discretion. Members agree to cooperate with and assist HRDP in good faith, and to provide HRDP with such information and take such actions as may be reasonably requested by HRDP with respect to any investigation undertaken by HRDP regarding the use or abuse of the HRDP Platform. HRDP is not acting as an agent for any Member except for where HRDP Payments acts as a collection agent as provided in the Payments Terms.
                        </p>

                        <li>
                            <b>Member Accounts.</b>
                        </li>
                        <p>
                            You must register an account to access and use many features of the HRDP Platform. Registration is only permitted for legal entities, partnerships and natural persons who are 18 years or older. You must provide accurate, current, and complete information during registration and keep your account information up-to-date. You may not register more than one account or transfer your account to someone else. You are responsible for maintaining the confidentiality and security of your account credentials and may not disclose your credentials to any third party. You are responsible and liable for activities conducted through your account and must immediately notify HRDP if you suspect that your credentials have been lost, stolen, or your account is otherwise compromised. If and as permitted by applicable law, we may, but have no obligation to (i) ask you to provide identification or other information, (ii) undertake checks designed to help verify your identity or background, (iii) screen you against third-party databases or other sources and request reports from service providers, and (iv) obtain reports from public records of criminal convictions or sex offender registrations or their local equivalents.
                        </p>

                        <li>
                            <b>Disclaimer of Warranties.</b>
                        </li>
                        <p>
                            <b>We provide the HRDP Platform and all Content “as is” without warranty of any kind and we disclaim all warranties, whether express or implied. For example: (i) we do not endorse or warrant the existence, conduct, performance, safety, quality, legality or suitability of any Customer, Trainer, Trainer Service, Offering or third party; (ii) we do not warrant the performance or non-interruption of the HRDP Platform; and (iii) we do not warrant that verification, identity or background checks conducted on Offerings or Members (if any) will identify past misconduct or prevent future misconduct. Any references to a Member or Offering being "verified" (or similar language) indicate only that the Member or Offering or HRDP has completed a relevant verification or identification process and nothing else. The disclaimers in these Terms apply to the maximum extent permitted by law. If you have statutory rights or warranties we cannot disclaim, the duration of any such statutorily required rights or warranties, will be limited to the maximum extent permitted by law.</b>
                        </p>

                        <li>
                            <b>Limitations on Liability.</b>
                        </li>
                        <p>
                            <b>
                                Neither HRDP (including its affiliates and personnel) nor any other party involved in creating, producing, or delivering the HRDP Platform or any Content will be liable for any incidental, special, exemplary or consequential damages, including lost profits, loss of data or loss of goodwill, service interruption, computer damage or system failure or the cost of substitute products or services, or for any damages for personal or bodily injury or emotional distress arising out of or in connection with (i) these Terms, (ii) the use of or inability to use the HRDP Platform or any Content, (iii) any communications, interactions or meetings you may have with someone you interact or meet with through, or as a result of, your use of the HRDP Platform, or (iv) publishing or booking of a Offering, including the provision or use of Trainer Services, whether based on warranty, contract, tort (including negligence), product liability or any other legal theory, and whether or not HRDP has been informed of the possibility of such damage, even if a limited remedy set out in these Terms is found to have failed of its essential purpose.
                                These limitations of liability and damages are fundamental elements of the agreement between you and HRDP. If applicable law does not allow the limitations of liability set out in these Terms, the above limitations may not apply to you.
                            </b>
                        </p>

                        <li>
                            <b>Indemnification</b>
                        </li>
                        <p>
                            <b>
                                To the maximum extent permitted by applicable law, you agree to release, defend (at HRDP’s option), indemnify, and hold HRDP (including HRDP Payments, other affiliates, and their personnel) harmless from and against any claims, liabilities, damages, losses, and expenses, including, without limitation, reasonable legal and accounting fees, arising out of or in any way connected with: (i) your breach of these Terms (including any supplemental or additional terms that apply to a product or feature) or our Additional Legal Terms,  Policies or Standards, (ii) your improper use of the HRDP Platform, (iii) your interaction with any Member, stay at an Course, participation in an Experience or other Trainer Service, including without limitation any injuries, losses or damages (whether compensatory, direct, incidental, consequential or otherwise) of any kind arising in connection with or as a result of such interaction, stay, participation or use, (iv) your failure, or our failure at your direction, to accurately report, collect or remit Taxes, or (v) your breach of any laws, regulations or third party rights such as intellectual property or privacy rights.
                            </b>
                        </p>

                        <li>
                            <b>Contact Us. </b>
                        </li>
                        <p>
                            If you have any questions about these Terms please email us.
                        </p>
                                </li>
                            </ol>

                        </li>

                    </ol>


                </div>
            </div>
        </div>

    </div>
@endsection
