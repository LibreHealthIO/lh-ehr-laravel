<template>
    <div>
        <Breadcrumb :page-routes="pagesRoutes" :active-link="activeLink"/>
        <div class="flex flex-col flex-grow">
            <div class="flex flex-row">
                <img :alt="patient.username" :src="patient.thumbnail" class="w-12 h-12 bg-red border border-teal-400 rounded-full text-left"/>
                <h2 class="font-bold text-2xl px-2 py-2">
                    {{ patient.first_name }} {{ patient.middle_name }} {{ patient.last_name }}
                </h2>
                <div class="mx-4 flex flex-row space-x-2">
                    <a href="#" class="w-6 h-6 p-1 rounded-full text-gray-700 bg-gray-300">
                        <Icon name="pencil-alt"/>
                    </a>
                    <a href="#" class="w-6 h-6 p-1 rounded-full text-red-700 bg-red-300">
                        <Icon name="trash"/>
                    </a>
                </div>
            </div>

            <ul id="patient-menu" class="flex flex-row items-center text-center text-gray-400 text-xs divide-x divide-gray-400 uppercase font-semibold mt-2 mb-3 space-x-3">
                <li class="inline-block">
                    <inertia-link
                        :href="route('patients.history', patient.id)"
                        class="py-1 mx-auto hover:text-teal-600" style="font-size: 12px;">
                        Summary
                    </inertia-link>
                </li>
                <li class="inline-block">
                    <inertia-link
                        :href="route('patients.history', patient.id)"
                        class="py-1 pl-2 hover:text-teal-600" style="font-size: 12px;">
                        History
                    </inertia-link>
                </li>
                <li class="inline-block">
                    <inertia-link
                        :href="route('patients.reports', patient.id)"
                        class="py-1 pl-2 hover:text-teal-600" style="font-size: 12px;">
                        Report
                    </inertia-link>
                </li>
                <li class="inline-block">
                    <inertia-link
                        :href="route('patients.documents', patient.id)"
                        class="py-1 pl-2 hover:text-teal-600" style="font-size: 12px;">
                        Documents
                    </inertia-link>
                </li>
                <li class="inline-block">
                    <inertia-link
                        :href="route('patients.transactions', patient.id)"
                        class="py-1 pl-2 hover:text-teal-600" style="font-size: 12px;">
                        Transactions
                    </inertia-link>
                </li>
                <li class="inline-block">
                    <inertia-link
                        :href="route('dashboard')"
                        class="py-1 pl-2 hover:text-teal-600" style="font-size: 12px;">
                        Issues
                    </inertia-link>
                </li>
                <li class="inline-block">
                    <inertia-link
                        :href="route('patients.ledger', patient.id)"
                        class="py-1 pl-2 hover:text-teal-600" style="font-size: 12px;">
                        Ledger
                    </inertia-link>
                </li>
                <li class="inline-block">
                    <inertia-link
                        :href="route('patients.appointments', patient.id)"
                        class="py-1 pl-2 hover:text-teal-600" style="font-size: 12px;">
                        Track Appointments
                    </inertia-link>
                </li>
            </ul>

            <div class="grid grid-cols-2 gap-8">
                <div>
                    <div class="w-full mx-auto mb-3">
                        <Accordion :title="$t('general.billing')" :active=true>
                            <p class="p-5">
                                <span>Patient Balance Due: <span class="font-bold">$0.00</span></span><br>
                                <span>Insurance Balance Due: <span class="font-bold">$0.00</span></span><br>
                                <span>Total Balance Due: <span class="font-bold">$0.00</span></span><br>
                            </p>
                        </Accordion>
                    </div>
                    <div class="w-full mx-auto mb-3">
                        <Accordion :title="$t('general.demographics')" :active=false>
                            <div class="p-4 space-y-2">
                                <nav class="border-b text-sm flex justify-start">
                                    <a class="inline-block px-4 py-2 text-gray-700 hover:text-black" href="#">Face Sheet</a>
                                    <a class="inline-block px-4 py-2 border-b-2 border-orange-600 text-orange-600 font-semibold" href="#">Contacts</a>
                                    <a class="inline-block px-4 py-2 text-gray-700 hover:text-black" href="#">Privacy</a>
                                    <a class="inline-block px-4 py-2 text-gray-700 hover:text-black" href="#">Employer</a>
                                    <a class="inline-block px-4 py-2 text-gray-700 hover:text-black" href="#">Social Statistics</a>
                                </nav>
                                <div class="p-2">
                                    <div id="p-face-sheet" class="flex">
                                        <div class="w-1/2 flex flex-col space-y-1">
                                            <span><strong>Name:</strong> Mua Rachmann</span>
                                            <span><strong>DOB:</strong> Mua Rachmann</span>
                                            <span><strong>Facility:</strong> Mua Rachmann</span>
                                            <span><strong>City:</strong> Mua Rachmann</span>
                                            <span><strong>Postal Code:</strong> Mua Rachmann</span>
                                            <span><strong>License/ID:</strong> Mua Rachmann</span>
                                            <span><strong>Contact Email:</strong> muarachmann@gmail.com</span>
                                        </div>
                                        <div class="w-1/2 flex flex-col space-y-1">
                                            <span><strong>Sex:</strong> Mua Rachmann</span>
                                            <span><strong>Marital Status:</strong> Mua Rachmann</span>
                                            <span><strong>Address:</strong> Mua Rachmann</span>
                                            <span><strong>State:</strong> Mua Rachmann</span>
                                            <span><strong>S.S.N.:</strong> Mua Rachmann</span>
                                            <span><strong>Mobile Phone:</strong> Mua Rachmann</span>
                                            <span><strong>Billing Note:</strong> muarachmann@gmail.com</span>
                                        </div>
                                    </div>
                                    <div id="p-contacts"></div>
                                    <div id="p-privacy"></div>
                                    <div id="p-employer"></div>
                                    <div id="p-social-stats"></div>
                                </div>
                            </div>
                        </Accordion>
                    </div>
                    <div class="w-full mx-auto mb-3">
                        <Accordion :title="$t('general.notes')" :active=false>
                            <p class="p-5">
                                <span>Patient Balance Due: <span class="font-bold">$0.00</span></span><br>
                                <span>Insurance Balance Due: <span class="font-bold">$0.00</span></span><br>
                                <span>Total Balance Due: <span class="font-bold">$0.00</span></span><br>
                            </p>
                        </Accordion>
                    </div>

                </div>
                <div>
                    <div class="w-full mx-auto mb-3">
                        <Accordion :title="$t('general.future_appointments')" :active=true>
                            <div class="p-2">
                                <table class="table-fixed">
                                    <tbody>
                                    <tr>
                                        <td class="px-4 py-2">Patient Appointment One</td>
                                        <td class="px-4 py-2">New Patient</td>
                                        <td class="px-4 py-2">02/1/2020</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </Accordion>
                    </div>
                    <div class="w-full mx-auto mb-3">
                        <Accordion :title="$t('general.medical_problems')" :active=true>
                            <p class="p-5">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur,
                                architecto, explicabo perferendis nostrum, maxime impedit atque odit sunt pariatur
                                illo obcaecati soluta molestias iure facere dolorum adipisci eum? Saepe, itaque.
                                illo obcaecati soluta molestias iure facere dolorum adipisci itaque.
                            </p>
                        </Accordion>
                    </div>
                    <div class="w-full mx-auto mb-3">
                        <Accordion :title="$t('general.allergies')" :active=false>
                            <p class="p-5">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur,
                                architecto, explicabo perferendis nostrum, maxime impedit atque odit sunt pariatur
                                illo obcaecati soluta molestias iure facere dolorum adipisci eum? Saepe, itaque.
                                illo obcaecati soluta molestias iure facere dolorum adipisci itaque.
                            </p>
                        </Accordion>
                    </div>
                    <div class="w-full mx-auto mb-3">
                        <Accordion :title="$t('general.medications')" :active=false>
                            <p class="p-5">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur,
                                architecto, explicabo perferendis nostrum, maxime impedit atque odit sunt pariatur
                                illo obcaecati soluta molestias iure facere dolorum adipisci eum? Saepe, itaque.
                                illo obcaecati soluta molestias iure facere dolorum adipisci itaque.
                            </p>
                        </Accordion>
                    </div>
                    <div class="w-full mx-auto mb-3">
                        <Accordion :title="$t('general.immunizations')" :active=false>
                            <p class="p-5">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur,
                                architecto, explicabo perferendis nostrum, maxime impedit atque odit sunt pariatur
                                illo obcaecati soluta molestias iure facere dolorum adipisci eum? Saepe, itaque.
                                illo obcaecati soluta molestias iure facere dolorum adipisci itaque.
                            </p>
                        </Accordion>
                    </div>
                    <div class="w-full mx-auto mb-3">
                        <Accordion :title="$t('general.prescriptions')" :active=false>
                            <p class="p-5">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur,
                                architecto, explicabo perferendis nostrum, maxime impedit atque odit sunt pariatur
                                illo obcaecati soluta molestias iure facere dolorum adipisci eum? Saepe, itaque.
                                illo obcaecati soluta molestias iure facere dolorum adipisci itaque.
                            </p>
                        </Accordion>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Accordion from "../../components/Accordion";
    import i18n from "../../i18n";
    import DashboardLayout from "../../layouts/DashboardLayout";

    export default {
        metaInfo: {
            title: i18n.t('menu.patient_client')
        },
        name: "patient.show",
        layout: DashboardLayout,
        props: {
            patient: Object,
        },
        data() {
            return {
                pagesRoutes: [
                    {
                        title : i18n.t('menu.patient_client'),
                        link : this.route('patients.index')
                    },
                ],
                activeLink: this.patient.first_name + " " + this.patient.last_name + " (" + this.patient.id + ")",
            }
        },
        components: {
            Accordion
        },
        methods: {
            //
        }
    }

</script>

