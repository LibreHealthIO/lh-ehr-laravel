<template>
    <layout>
        <Breadcrumb :page-routes="pagesRoutes" :active-link="activeLink"/>
        <div class="flex-row flex-grow">
            <div class="float-left prose">
                <h2 class="text-bold">
                    {{ patient.first_name }} {{ patient.middle_name }} {{ patient.last_name }}
                </h2>
            </div>
            <p class="clearfix"></p>
            <ul id="patient-menu" class="flex text-gray-400 text-xs uppercase font-semibold mt-2 mb-3 space-x-3">
                <li class="inline-block">
                    <inertia-link
                        :href="route('patients.history', patient.id)"
                        class="py-1 hover:text-teal-600" style="font-size: 12px;">
                        History
                    </inertia-link>
                </li>
                <li class="inline-block">
                    <inertia-link
                        :href="route('patients.reports', patient.id)"
                        class="py-1 hover:text-teal-600" style="font-size: 12px;">
                        Report
                    </inertia-link>
                </li>
                <li class="inline-block">
                    <inertia-link
                        :href="route('patients.documents', patient.id)"
                        class="py-1 hover:text-teal-600" style="font-size: 12px;">
                        Documents
                    </inertia-link>
                </li>
                <li class="inline-block">
                    <inertia-link
                        :href="route('patients.transactions', patient.id)"
                        class="py-1 hover:text-teal-600" style="font-size: 12px;">
                        Transactions
                    </inertia-link>
                </li>
                <li class="inline-block">
                    <inertia-link
                        :href="route('dashboard')"
                        class="py-1 hover:text-teal-600" style="font-size: 12px;">
                        Issues
                    </inertia-link>
                </li>
                <li class="inline-block">
                    <inertia-link
                        :href="route('patients.ledger', patient.id)"
                        class="py-1 hover:text-teal-600" style="font-size: 12px;">
                        Ledger
                    </inertia-link>
                </li>
                <li class="inline-block">
                    <inertia-link
                        :href="route('patients.appointments', patient.id)"
                        class="py-1 hover:text-teal-600" style="font-size: 12px;">
                        Track Appointments
                    </inertia-link>
                </li>
            </ul>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <div class="w-full md:w-3/5 mx-auto mb-3">
                        <Accordion :title="$t('general.billing')" :active=true>
                            <p class="p-5">
                                <span>Patient Balance Due: <span class="font-bold">$0.00</span></span><br>
                                <span>Insurance Balance Due: <span class="font-bold">$0.00</span></span><br>
                                <span>Total Balance Due: <span class="font-bold">$0.00</span></span><br>
                            </p>
                        </Accordion>
                    </div>
                    <div class="w-full md:w-3/5 mx-auto mb-3">
                        <Accordion :title="$t('general.demographics')" :active=false>
                            <p class="p-5">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur,
                                architecto, explicabo perferendis nostrum, maxime impedit atque odit sunt pariatur
                                illo obcaecati soluta molestias iure facere dolorum adipisci eum? Saepe, itaque.
                                illo obcaecati soluta molestias iure facere dolorum adipisci itaque.
                            </p>
                        </Accordion>
                    </div>
                    <div class="w-full md:w-3/5 mx-auto mb-3">
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
                    <div class="w-full md:w-3/5 mx-auto mb-3">
                        <Accordion :title="$t('general.future_appointments')" :active=true>
                            <div class="p-2">
                                <table class="table-fixed">
                                    <tbody>
                                    <tr>
                                        <td class="px-4 py-2">Intro to JavaScript</td>
                                        <td class="px-4 py-2">Chris</td>
                                        <td class="px-4 py-2">1,280</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </Accordion>
                    </div>
                    <div class="w-full md:w-3/5 mx-auto mb-3">
                        <Accordion :title="$t('general.medical_problems')" :active=true>
                            <p class="p-5">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur,
                                architecto, explicabo perferendis nostrum, maxime impedit atque odit sunt pariatur
                                illo obcaecati soluta molestias iure facere dolorum adipisci eum? Saepe, itaque.
                                illo obcaecati soluta molestias iure facere dolorum adipisci itaque.
                            </p>
                        </Accordion>
                    </div>
                    <div class="w-full md:w-3/5 mx-auto mb-3">
                        <Accordion :title="$t('general.allergies')" :active=false>
                            <p class="p-5">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur,
                                architecto, explicabo perferendis nostrum, maxime impedit atque odit sunt pariatur
                                illo obcaecati soluta molestias iure facere dolorum adipisci eum? Saepe, itaque.
                                illo obcaecati soluta molestias iure facere dolorum adipisci itaque.
                            </p>
                        </Accordion>
                    </div>
                    <div class="w-full md:w-3/5 mx-auto mb-3">
                        <Accordion :title="$t('general.medications')" :active=false>
                            <p class="p-5">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur,
                                architecto, explicabo perferendis nostrum, maxime impedit atque odit sunt pariatur
                                illo obcaecati soluta molestias iure facere dolorum adipisci eum? Saepe, itaque.
                                illo obcaecati soluta molestias iure facere dolorum adipisci itaque.
                            </p>
                        </Accordion>
                    </div>
                    <div class="w-full md:w-3/5 mx-auto mb-3">
                        <Accordion :title="$t('general.immunizations')" :active=false>
                            <p class="p-5">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur,
                                architecto, explicabo perferendis nostrum, maxime impedit atque odit sunt pariatur
                                illo obcaecati soluta molestias iure facere dolorum adipisci eum? Saepe, itaque.
                                illo obcaecati soluta molestias iure facere dolorum adipisci itaque.
                            </p>
                        </Accordion>
                    </div>
                    <div class="w-full md:w-3/5 mx-auto mb-3">
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
    </layout>
</template>

<script>
    import Layout from "~/Shared/Layout"
    import Breadcrumb from "../../components/Breadcrumb"
    import Accordion from "../../components/Accordion"
    import i18n from '~/i18n'

    let myBreadcrumbs = [
        {
            title : i18n.t('menu.patient_client'),
            link : route('patients.index')
        },
    ];
    export default {
        metaInfo: { title: i18n.t('menu.patient_client') },
        name: "patient.show",
        props: {
            patient: Object,
        },
        data() {
            return {
                pagesRoutes: myBreadcrumbs,
                activeLink: this.patient.first_name + " " + this.patient.last_name + "(" + this.patient.id + ")",
            }
        },
        components: {
            Layout,
            Breadcrumb,
            Accordion
        },
    }

</script>

