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
                    <div class="w-full md:w-3/5 mx-auto">
                        <div class="shadow-md">
                            <div class="tab w-full overflow-hidden border-t">
                                <input class="absolute opacity-0 " id="billing" type="checkbox" name="tabs">
                                <label class="block py-2 px-5 leading-normal uppercase font-semibold cursor-pointer" for="billing">Billing</label>
                                <div class="tab-content overflow-hidden leading-normal">
                                    <p class="p-5">
                                        <span>Patient ID: {{ patient.id }}</span><br>
                                        <span>First Name: {{ patient.first_name }}</span><br>
                                        <span>Middle Name: {{ patient.middle_name }}</span><br>
                                        <span>Last Name: {{ patient.last_name }}</span><br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="w-full md:w-3/5 mx-auto">
                        <div class="shadow-md">
                            <div class="tab w-full overflow-hidden border-t">
                                <input class="absolute opacity-0 " id="appts" type="checkbox" name="tabs">
                                <label class="block py-2 px-5 leading-normal uppercase font-semibold cursor-pointer" for="appts">Future Apointments</label>
                                <div class="tab-content overflow-hidden leading-normal">
                                    <p class="p-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur,
                                        architecto, explicabo perferendis nostrum, maxime impedit atque odit sunt pariatur
                                        illo obcaecati soluta molestias iure facere dolorum adipisci eum? Saepe, itaque.
                                        illo obcaecati soluta molestias iure facere dolorum adipisci itaque.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
    import Layout from "~/Shared/Layout"
    import Breadcrumb from "../../components/Breadcrumb"
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
        },
    }

</script>

