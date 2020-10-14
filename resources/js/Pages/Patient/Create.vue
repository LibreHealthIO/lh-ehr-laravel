<template>
    <layout>
        <Breadcrumb :page-routes="pagesRoutes" :active-link="activeLink"/>
        <h1  class="text-xl font-light mb-3">Add New Patient</h1>
        <div class="flex-row flex-grow">
            <form @submit.prevent="submit" class="w-full mt-2">
                <div class="flex mb-4">
                    <div class="flex flex-wrap w-1/2">
                        <div class="md:w-full px-3 mb-6 md:mb-2">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Facility
                            </label>
                            <div class="relative mt-2">
                                <select class="appearance-none block w-full bg-white text-gray-700 border border-gray-500
                                 py-1 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option>Unassigned</option>
                                    <option v-for="facility in facilities" :value="facility.id">
                                        {{ facility.name }}
                                    </option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="md:w-1/3 px-3 mb-6 md:mb-2">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                First Name
                            </label>
                            <input class="appearance-none block w-full bg-white text-gray-700 border border-gray-500
                    py-1 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                   value="" name="fname" minlength="3" maxlength="25" type="text" placeholder="Jane" required>
                        </div>
                        <div class="md:w-1/3 px-3 mb-6 md:mb-5">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Middle Name
                            </label>
                            <input class="appearance-none block w-full bg-white text-gray-700 border border-gray-500
                    py-1 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                   value="" name="fname" minlength="3" maxlength="25" type="text" placeholder="Jane" required>
                        </div>
                        <div class="md:w-1/3 px-3 mb-6 md:mb-2">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Last Name
                            </label>
                            <input class="appearance-none block w-full bg-white text-gray-700 border border-gray-500
                    py-1 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                   value="" name="fname" minlength="3" maxlength="25" type="text" placeholder="Jane" required>
                        </div>
                        <div class="md:w-full px-3 mb-6 md:mb-2">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Mobile Phone
                            </label>
                            <VuePhoneNumberInput v-model="initialPhone" />
                        </div>
                        <div class="md:w-full px-3 mb-6 md:mb-2">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Contact Email
                            </label>
                            <input class="appearance-none block w-full bg-white text-gray-700 border border-gray-500
                    py-1 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                   value="" name="fname" minlength="3" maxlength="25" type="text" placeholder="Jane" required>
                        </div>
                    </div>
                    <div class="flex flex-wrap w-1/2">
                        <div class="md:w-1/3 px-3 mb-6 md:mb-2">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Sex
                            </label>
                            <div class="relative mt-2">
                                <select class="appearance-none block w-full bg-white text-gray-700 border border-gray-500
                                 py-1 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option>Unassigned</option>
                                    <option value="male">Male</option>
                                    <option value="male">Female</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                            <custom-date-picker
                                :name="$t('forms.date_of_birth')"
                                :placeholder="$t('forms.date_of_birth')"/>
                        </div>
                        <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Marital Status
                            </label>
                            <div class="relative mt-2">
                                <select class="appearance-none block w-full bg-white text-gray-700 border border-gray-500
                                 py-1 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option>Unassigned</option>
                                    <option value="male">Married</option>
                                    <option value="male">Single</option>
                                    <option value="male">Divorced</option>
                                    <option value="male">Widowed</option>
                                    <option value="male">Separated</option>
                                    <option value="male">Domestic Partner</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="md:w-full px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Address
                            </label>
                            <input class="appearance-none block w-full bg-white text-gray-700 border border-gray-500
                    py-1 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                   value="" name="address" minlength="3" maxlength="25" type="text" placeholder="Address" required>
                        </div>
                        <div class="md:w-full px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Billing Note
                            </label>
                            <textarea placeholder="Billing note" class="appearance-none block w-full bg-white text-gray-700 border border-gray-500
                    py-1 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500bg-transparent" name="billing_note"></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="flex text-base text-white justify-center px-10 py-3 rounded-md bg-gray-900 mb-3">
                    <svg class="hidden animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    {{ $t('forms.continue') }}
                </button>
            </form>
        </div>
    </layout>
</template>

<script>
    import Layout from "~/Shared/Layout"
    import Breadcrumb from "~/components/Breadcrumb"
    import CustomDatePicker from "~/components/datepickers/CustomDatePicker";
    import i18n from '~/i18n'
    import VuePhoneNumberInput from 'vue-phone-number-input'

    // css imports
    import 'vue-phone-number-input/dist/vue-phone-number-input.css';

    let myBreadcrumbs = [
        {
            title : i18n.t('menu.patient_client'),
            link : route('patients.index')
        },
    ];

    export default {
        metaInfo: { title: i18n.t('menu.patient_client') },
        name: "patient.create",
        props: ['facilities'],
        data: () => {
            return {
                sending: false,
                pagesRoutes: myBreadcrumbs,
                activeLink: 'Add Patients/Clients',
                initialPhone: '+237670518086',
            };
        },
        components: {
            Layout,
            Breadcrumb,
            CustomDatePicker,
            VuePhoneNumberInput,
        },
        methods: {
            submit() {
                this.sending = true;
                let data = new FormData();
                data.append('first_name', '');
                this.$inertia.post(this.route('patients.store'), data)
                    .then(() => this.sending = false)
            },
        }
    }
</script>

