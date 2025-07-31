<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Component - Header</title>
    <link rel="stylesheet" href="{{ asset('css/admin/consent.css') }}">
    <style>
        .agree-btn, .disagree-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 50px;
            font-size: 16px;
            border-radius: 6px;
            width: 100%;
            text-decoration: none;
            font-weight: bold;
        }

        .agree-btn {
            background-color: #007bff;
            color: white;
            border: none;
        }

        .disagree-btn {
            background-color: white;
            color: #007bff;
            border: 2px solid #007bff;
        }

        .button-section {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
@auth
    @include('component.navbar') <!-- Show navbar for authenticated users -->
@endauth

@guest
    @include('component.guest-navbar') <!-- Show guest navbar for guests -->
@endguest

    <header class="page-header py-1" style="background-image: url('{{ asset('primary-bg.svg') }}');">
        <h1 class="page-header__title p-5 px-5"><p class="pl-5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Terms and Conditions</p></h1>
    </header>
<body>
    <div class="container" style="margin-bottom: -15%;">
        <div class="card" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
            <div class="card-body m-5">
                <p class="fw-semibold" style="font-size: 22px;">Privacy Policy</p>
                <p>Philippine Christian University, a distinctively strong Christian university integrating faith, character and service gives significance to its mandate in compliance with the requirements under RA 10173 known as the Data Privacy Act of 2012 the value of every individual’s right to privacy and safeguarding confidentially personal information obtained, and is committed to secure all documents responsibly. It defines what information will be collected or gathered and the details on how collected information be protected without incurring violation of individual’s personal privacy.</p>
                <p>This Privacy Policy statement simplifies how personal information of data subjects whose personal, sensitive or privileged information are being obtained, stored, used, shared, processed, generated, protected and/ or withheld in custody by the university. And, it is in general in scope and applies to all service units of the university unless amended when needed.</p>
                <br>
                <hr>
                <p class="fw-semibold" style="font-size: 22px;">Classification of Personal Information</p>
                <p>Under Data Privacy Act (DPA) of 2012, defines the following:</p>
                <p>1. Personal information refers to any information whether recorded in a material form or not, from which the identity of an individual is apparent or can be reasonably and directly ascertained by the entity holding the information, or when put together with other information would directly and certainly identify an individual.</p>
                <p>2. Sensitive personal information refers to personal information:</p>
                <ol>
                    <li type="A">Of an individual’s race, ethnic origin, marital status, age, color, and religious, philosophical or political affiliations;</li>
                    <li type="A">Of an individual’s health, education, genetic or sexual life of a person, or to any proceeding for any offense committed or alleged to have been committed by such person, the disposal of such proceedings, or the sentence of any court in such proceedings</li>
                    <li type="A">Issued by government agencies peculiar to an individual which includes, but not limited to, social security numbers, previous or current health records, licenses or its denials, suspension or revocation, and tax returns</li>
                    <li type="A">Specifically established by an executive order or an act of Congress to be kept classified</li>
                </ol>
                <!-- <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(1) Of an individual’s race, ethnic origin, marital status, age, color, and religious, philosophical or political affiliations;</p>
                <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(2) Of an individual’s health, education, genetic or sexual life of a person, or to any proceeding for any offense</p>
                <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;committed or alleged to have been committed by such person, the disposal of such proceedings, or the sentence of any court in such proceedings.</p>
                <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (3) Issued by government agencies peculiar to an individual which includes, but not
                limited to, social security numbers, previous or current health records, licenses or
                its denials, suspension or revocation, and tax returns; and</p>
                <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  (4) Specifically established by an executive order or an act of Congress to be kept
                classified.</p> -->
                <hr>
                <br>
                <p class="fw-semibold" style="font-size: 22px;">University Storage of Personal Information</p>
                <br>
                <p class="fw-semibold">A. Information we gather</p>
                <br>
                <p>PCU gathers the following information only as indicated through the following:</p>
                <p>Personal Information, as follows, to wit : name, residential address, email address,  telephone number, mobile number, date of birth, passport details (for foreign nationals). The university will also issue applicant/student identification number once he/she is officially enrolled /registered in the University;</p>
                <p>Education background and/or employment portfolio: to include school(s)and/or universities enrolled or concluded, programs and course completed, date(s) of completion, and the institution(s) where it was completed and employment as well.
                Family or personal dealings, and academic and other extracurricular interests for assessment purpose, to avail scholarships/student financial aids/assistance;</p>
                <p>Sensitive personal information to include such as : marital status, age, race, education religious and political affiliations, sexual preferences or practices, criminal record, health /medical history or memberships details, religious or philosophical beliefs and ethnicity, social security number (SSS for private worker), government service insurance system number (GSIS for government worker)/ , licenses or its denials, suspension or revocation, and tax returns.</p>
                <p>Websites other than PCU websites are not kept by the university except IP address and System log files, but allows the university to create and host sites or pages (e.g. any social media platform).</p>
                <br>
                <p>PCU computers serves to allow us to log and information collected from the system consists only of the following:</p>
                <ol>
                    <li type="A">Internet Address (IP number) of the website from which you linked</li>
                    <li type="A">Name of the Internet domain from which you access the internet</li>
                    <li type="A">Date and time (you visited PCU website)</li>
                </ol>
                
                <br>
                    <p class="fw-semibold">How to collect.</p>
                <br>
                <p>By the information provided by the learner in expressing his interest in studying in the university;</p>
                <p>By enrolling and completes application form/enrolment form and comply school admission requirements and policy. However when enrolled, the university may also extract/collect additional information about the learner ( data subject), his/her academic or curricular undertakings, or any disciplinary action that the learner may be</p>
                <p>documentation of activities installed within school premises. But if, unsolicited information, even without prior request, the university will determine if to keep such information for the university  legitimate interests otherwise we will dispose such data collected or processed to protect or safeguard learner’s privacy.</p>
                <p>Queries or communicating with the university via electronic email, and other various social media platforms; and From previous school/s, university or employers who may provide references on the learner’s identity.</p>
                
                <br>
                    <p class="fw-semibold">C. Sources of collected information gathered.</p>
                <br> 
                <p>From the following, namely:</p>
                <ul>
                    <li>prospective and current students</li>
                    <li>exchange/foreign students</li>
                    <li>visiting/adjunct and exchange professors</li>
                    <li>applicants</li>
                    <li>employees</li>
                    <li>alumni</li>
                    <li>donors (individual/company)</li>
                    <li>researchers</li>
                    <li>industry partners</li>
                    <li>university contractors, suppliers, concessionaires</li>
                    <li>university linkages, consortium and immersion</li>
                    <li>civic or religious organization</li>
                    <li>other members who may have transactions with the university</li>
                </ul>

                <br>
                    <p class="fw-semibold">D. Usage of Data Subject Information</p>
                <br> 
                <p>
                    Personal and sensitive personal information are to be used for the following such as:
                    <br>
                    For educational support: admission, enrolment, assessment/testing, learning activities,
                    <br>
                    graduation, student services such as counselling, library use, medical examination;
                    <br>
                    For research: data analysis and experiments;
                    <br>
                    For community extension: linkages, immersion, consortium and industry affiliations, alumni activities, industry partnerships, website operation,
                    <br>
                    event invitations and community forum;
                    <br>
                    For employment: recruitment, payroll processing, human resource programs and procurement activities, and annual physical examination;
                    <br>
                    For operational management: processing fees, data analysis, financial matters, IT, legal and professional services, educational opportunities, CCTV
                    <br>
                    monitoring, access to systems for security and safety or emergency response;
                    <br>
                    For non-academic matters: student concerns, parking within the campus, dealing with grievances and disciplinary actions and other services
                    <br>
                    catered relative to school operations; and
                    <br>
                    For other primary purpose or as authorized by law.
                    <br>
                </p>

                <br>
                    <p class="fw-semibold">E. To whom we share your information</p>
                <br>
                <p>Under the Data Privacy Principles, Rule IV of Data Privacy Act of 2012, the university may
                    <br>
                   share your personal data with any person acting in your behalf or certain third parties or
                    <br>
                    personnel in adherence to the principles of transparency and legitimate purposes and
                    <br>
                    proportionality and with prior consent freely/voluntarily given by the data subject with
                    <br>
                    adequate safeguards in place.
                </p>

                <br>
                    <p class="fw-semibold">F. To store and protect your information</p>
                <br>
                    <p>The university takes appropriate security and safety measures to safeguard personal privacy</p>
                    <p>
                        <br>
                        confidentiality of any personal information and other data from, loss, damage, process, and
                        <br>
                        unauthorized collection/disclosure, access or use by:
                    </p>
                    <p>
                        Storing information in accordance with the ICT Policy of the University which
                        <br>
                        determines when information should be retained or properly disposed when no longer
                        <br>
                        needed unless applicable law requires disposal after the expiration of retention period.
                        <br>
                        Personal information may be disposed upon valid request in the manner appropriate to
                        <br>
                        preserve and ensure the confidentiality, sensitivity and criticality of said information. Information collected and data generated are not to be shared with any other
                        <br>
                        party unless disclosure is reasonably necessary with prior knowledge and written consent from the data subject and/or through judicial notice.
                    </p>
                <br>
                    <p class="fw-semibold">G. Retention of Data Quality information</p>
                <br>
                    <p>
                        The university takes cognizance in the encryption of personal data and in the collecting or
                        <br>
                        retaining data to ensure that the personal data collected and processed are reliable and
                        <br>
                        accurate for its intended use.
                    </p>
                <p class="fw-semibold" style="font-size: 22px;">Privacy Policy</p>
                <p>
                    In accordance with <a class="text-danger">Data Privacy Act of 2012 (RA 10173)</a> and its implementing Rules and
                    <br>
                    Regulations, the Data Subject is accorded the following rights:
                </p>
                <p>
                    <b>Right to be informed</b>
                </p>
                <p>
                    Data subject has the right to be informed whether personal information pertaining to him or
                    <br>
                    her shall be, are being or have been processed.
                    <br>
                    Data subject has the right to be notified and furnished with the information before the entry of
                    <br>
                    his or her personal data into the processing system of the personal information controller, to
                    <br>
                    include the following:
                </p>
                <p>
                    Description, purpose, basis of processing, scope and method of personal data to be entered into the system, recipients to whom personal data are to be disclosed,
                    <br>
                    methods utilized for automated access and the extent to which such access is authorized.
                </p>
                <br>
                <p><b>Right to Object</b></p>
                <p>
                    Data subject has the right to object to the processing of his or her personal data or withholds
                    <br>
                    consent except when such data is being processed as required by law.
                    <br>
                    Right to Access
                    <br>
                    Data subject has the right to reasonable access upon demand, the following:
                </p>
                <br>
                <p>
                    <ol>
                        <li type="A">contents of his or personal data processed</li>
                        <li type="A">sources from which personal data were obtained</li>
                        <li type="A">name and addresses of recipients</li>
                        <li type="A">manner by which data were processed</li>
                        <li type="A">reasons for disclosure of personal data to recipient, If any</li>
                        <li type="A">Information on automated processes where data will be made;</li>
                        <li type="A">obtain a copy of data undergoing processing hard/printed copies as electronic form</li>
                        <li type="A">request in writing purposely to share personal information gathered with any person acting in behalf of the data subject</li>
                    </ol>
                </p>
                <br>
                <p><b>Right to Rectify, Request, Restrict</b></p>
                <p>
                    Data subject has the right to dispute the inaccuracy or error in the personal data and have the
                    <br>
                    personal information controller rectify said data immediately and accordingly, unless the
                    <br>
                    request is vexatious or otherwise unreasonable.
                    <br>
                    Data subject has the right to suspend, withdraw or order the blocking, removal or destruction
                    <br>
                    of his or her personal data upon discovery and substantial proof of any of the following:
                    <br>
                    If incomplete, outdated, false or unlawfully obtained
                </p>
                <p>
                    Unauthorized purpose
                    <br>
                    Data collected no longer necessary for the purpose
                    <br>
                    Withdraws consent or objects to the processing
                    <br>
                    It concerns private information that would prejudice the data subject
                    <br>
                    Unlawful processing
                    <br>
                    Rights have been violated
                </p>
                <br>
                <p><b>Right to Damages </b></p>
                <p>
                    Data subject shall be indemnified for any damages incurred due to: inaccurate, incomplete, outdated, false, unlawfully obtained or unauthorized use of personal
                    <br>
                    data taking into account
                    <br>
                    any violation of his or her rights and freedom as data subject; and
                </p>
                <br>
                <p><b>Right to Sue </b></p>
                <p>
                    The right to file a complaint before the National Privacy Commission
                </p>
                <p class="fw-semibold" style="font-size: 22px;">Other Data Subject’s Personal Information</p>
                <p>
                    If providing personal information regarding other individuals or data subjects, the data subject
                </p>
                <p>
                    concern shall be informed and consent freely given either in writing or electronic form for the
                    <br>
                    collection, use, disclosure, and transfer of data subject personal information in accordance with
                    <br>
                    RA 10173. However, if information to be collected is that of a minor, prior consent from the
                    <br>
                    parent or legal guardian shall be obtained.
                </p>
            </div>

        </div>
        <div class="card-footer m-5">
            <div class="button-section">
                    <div class="row d-flex justify-content-center w-100">
                        <div class="col-md-3 col-5">
                            <a class="btn btn-primary agree-btn" href="{{ url('agree') }}">I Agree</a>                     
                        </div>
                        <div class="col-md-3 col-5">
                            <a class="btn disagree-btn" href="{{ url('/') }}">I Disagree</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</body>
</html>