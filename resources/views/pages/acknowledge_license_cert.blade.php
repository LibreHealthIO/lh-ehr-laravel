@extends('layouts.master')

@section('title', 'Acknowledgments, Licensing and Certification')

@section('content')

    <div class="w-full h-screen flex">
        <div class="bg-white flex flex-col justify-center w-3/12 items-center max-h-full overflow-scroll-container overflow-auto overflow-x-hidden">
            <img class="w-full mt-10 mb-2 px-5" src="{{ asset('images/logos/ehr_logo.png') }}" alt="LibreHealth Logo">
            <h2 class="leading-5">The Power of medical health data</h2>
        </div>
        <div class="bg-white flex flex-col w-9/12 items-center max-h-full overflow-scroll-container overflow-auto shadow-lg border-solid border-t-4 border-orange-600">
            @include('includes.language_switcher')
            <div class="my-5 w-full">
                <div class="mr-32 ml-32 mt-10 rounded-sm border border-gray-200 bg-white shadow-lg">
                    <div class="text-right p-5">
                        <span class="text-xs text-gray-500 tracking-widest">
                            <span class="uppercase">{{ app_name() }}</span> <span>(v{{ app_version() }})</span>
                        </span>
                    </div>
                    <div class="flex items-center relative mt-2 mb-8">
                        <div class="border-t border-gray-200 z-20 w-full"></div>
                        <div class="rounded-full bg-white border border-t z-20 p-2 inline-block absolute mx-5">
                            <a href="{{ route('index') }}" title="LibreHealth Logo">
                                <img alt="{{ config('app.name') }}" src="{{ asset('images/logo.png') }}" class="fill-current text-white inline-block h-8 w-8">
                            </a>
                        </div>
                        <div class="rounded-full bg-gray-800 z-20 p-2 inline-block right-5 absolute mx-5">
                            <a href="https://github.com/LibreHealthIO/lh-ehr-laravel.git" alt="LibreHealth Github Repo" title="Fork me on Github">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-white inline-block h-8 w-8" viewBox="0 0 25 25">
                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="prose p-10">
                        <h1 class="leading-5 underline">Acknowledgments, Licensing and Certification</h1>
                        <h3>License information</h3>
                        <div class="paragraph">
                            Unless otherwise stated, this code is subject to the terms of the <a href="mpl_license.txt">
                                Mozilla Public License v 2.0 (MPL)</a>, a copy of which is included here for your convenience.<br>
                            This code is also distributed under the terms of the <a href="#healthcare_disclaimer">Healthcare Disclaimer</a>,
                            which can be found at the bottom of this page.
                        </div>
                        <h3>Websites</h3>
                        <div class="paragraph">
                            <a href="http://librehealth.io/">LibreHealth EHR</a> - The LibreHealth EHR website: <a href="http://librehealth.io/">librehealth.io</a><br>
                            <a href="https://forums.librehealth.io/">LibreHealth Community Forum</a>
                        </div>

                        <h3>Special Thanks</h3>
                        <div class="paragraph">
                            To all the contributers at open-emr.org for all the years of work they put in to their product which LibreHealth EHR is forked from.<br>
                            To see all the contributers you can visit their acknowledgements page at open-emr.org.<br>
                            Thanks Folks!!!
                            <h3>
                                LibreHealth is collaobrative community for free &amp; open source software projects in Health IT, and is a member project of Software Freedom Conservancy.
                            </h3>
                        </div>

                        <h3>Certification</h3>
                        <div class="paragraph">
                            Up and coming
                            <ul>
                                <li>Managed and provided by librehealth.io  - <a href="http://librehealth.io">librehealth.io</a></li>
                            </ul>
                        </div>

                        <h3>List of Contributors</h3>

                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Contributor</th>
                                <th>Contact</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Bowen Medical</td>
                                <td><a href="http://www.bowenmd.com">Bowen Medical</a><br>
                                    2365 Springs Rd NE, Hickory, NC 28601<br>
                                    Emily Killian<br>
                                    Nikolai Vitsyn<br>
                                    Samuel T. Bowen, MD<br>
                                    <a href="mailto:drbowen@bowenmd.com">drbowen@bowenmd.com</a><br></td>
                            </tr>

                            <tr>
                                <td>Kevin Yeh</td>
                                <td>kevin.y@integralemr.com</td>
                            </tr>

                            <tr>
                                <td>Lilly Systems &amp; Solutions</td>
                                <td><a href="http://www.lillysystems.com/">www.lillysystems.com</a><br>
                                    libreehr@lillysystems.com<br>
                                    Including:<br>
                                    Jim Lilly<br>
                                    Debbie Lilly<br>
                                    Jacob Harrison<br>
                                    Terry Hill</td>
                            </tr>

                            <tr>
                                <td>
                                    Medical Information Integration, LLC</td>
                                <td><a href="http://www.mi-squared.com/">www.mi-squared.com</a><br>
                                    info@mi-squared.com<br>
                                    Aron Racho<br>
                                    Jeremy Wallace<br>
                                    Ken Chapple<br>
                                    Tony McCormick<br>
                                    Dan Pflieger<br>
                                    Harley Tuck<br>
                                    Sara McCormick<br>
                                    Various MI2 Contractors
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    SunCoast Connection Inc.</td>
                                <td><a href="http://suncoastconnection.com/">SunCoastConnection.com</a><br>
                                    art@suncoastconnection.com<br>
                                    Art Eaton<br>
                                    Bryan Lee<br>
                                    Lana Woods<br>

                                </td></tr><tr>
                                <td>
                                    2017 Google Summer of Code Students</td>
                                <td><a href="https://forums.librehealth.io/groups/GSoC2017Students">GSOC Students</a><br>
                                    Ujjwal Arora<br>
                                    Nilesh Prasad<br>
                                    Priyanshu Sinha</td>
                            </tr>


                            </tbody>
                        </table>
                        <h3>Healthcare Disclaimer</h3>
                        <a name="healthcare_disclaimer"></a>
                        <div class="paragraph">
                            In the United States, or any other jurisdictions where they may apply, the following additional disclaimer of warranty and limitation of liability are hereby incorporated into the terms and conditions of GPL:
                            <ol>
                                <li>No warranties of any kind whatsoever are made as to the results that You will obtain from relying upon the covered code (or any information or content obtained by way of the covered code), including but not limited to compliance with privacy laws or regulations or clinical care industry standards and protocols. Use of the covered code is not a substitute for a health care provider's standard practice or professional judgment. Any decision with regard to the appropriateness of treatment, or the validity or reliability of information or content made available by the covered code, is the sole responsibility of the health care provider. Consequently, it is incumbent upon each health care provider to verify all medical history and treatment plans with each patient.</li>
                                <li>Under no circumstances and under no legal theory, whether tort (including negligence), contract, or otherwise, shall any Contributor, or anyone who distributes Covered Software as permitted by the license, be liable to You for any indirect, special, incidental, consequential damages of any character including, without limitation, damages for loss of goodwill, work stoppage, computer failure or malfunction, or any and all other damages or losses, of any nature whatsoever (direct or otherwise) on account of or associated with the use or inability to use the covered content (including, without limitation, the use of information or content made available by the covered code, all documentation associated therewith, and the failure of the covered code to comply with privacy laws and regulations or clinical care industry standards and protocols), even if such party shall have been informed of the possibility of such damages.</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            @include('partials.footer')
        </div>
    </div>




    @endsection
