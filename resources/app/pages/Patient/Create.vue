<template>
    <div>
        <Breadcrumb :page-routes="pagesRoutes" :active-link="activeLink"/>
        <div class="flex flex-row justify-end -mt-2">
            <button class="bg-gray-900 hover:bg-theme-1 text-white rounded px-6 py-3 text-center">
                Create  Patient
            </button>
        </div>
        <div class="w-full mx-auto bg-gray-100 bg-opacity-60 mt-2 p-5">
            <form @submit.prevent="submit" class="space-y-6">
                <section class="w-full flex flex-col" id="face_sheet">
                    <div class="flex flex-row items-center content-center text-center">
                        <div v-tippy="{ arrow : true,  animation : 'perspective'}"
                             content='Toggle Patient Section' class="flex justify-center bg-green-500 items-center text-center w-5 h-5 cursor-pointer rounded-full mr-2 transform border border-green-700 text-white bg-transparent hover:bg-green-600 hover:scale-110">
                            <icon name="check" class="cursor-pointer w-6 h-6 p-0.5" />
                        </div>
                        <h3 class="text-lg font-bold text-green-500">Face Sheet</h3>
                    </div>
                    <h1>Patient Details</h1>
                </section>
                <section class="w-full flex flex-col" id="contacts">
                    <div class="flex flex-row items-center content-center text-center">
                        <div v-on:click="togglePatientSection('contacts')" v-tippy="{ arrow : true,  animation : 'perspective'}"
                             content='Toggle Contacts Section'
                             :class="selected_sections.includes('contacts') ? 'bg-green-500 border-green-700' : 'border-gray-500'"
                             class="flex justify-center border items-center text-center w-5 h-5 cursor-pointer rounded-full mr-2 transform text-white hover:scale-110">
                            <icon v-if="selected_sections.includes('contacts')" name="check" class="cursor-pointer w-6 h-6 p-0.5" />
                        </div>
                        <h3 class="text-lg font-bold text-green-500">Contacts</h3>
                    </div>
                    <div v-if="selected_sections.includes('contacts')" class="container mx-10 my-5">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-4 sm:col-span-3">
                                <ehr-input
                                    label="Full Name(s)"
                                    :class="'text-theme-3 font-medium'"
                                    v-model="patientForm.name"
                                    :error="patientForm.errors.name"
                                    id="name"
                                    required/>
                            </div>
                            <div class="col-span-4 sm:col-span-3">
                                <ehr-input
                                    label="Email"
                                    :class="'text-theme-3 font-medium'"
                                    v-model="patientForm.email"
                                    :error="patientForm.errors.email"
                                    id="email"
                                    required/>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <ehr-input
                                    label="Full Name(s)"
                                    :class="'text-theme-3 font-medium'"
                                    v-model="patientForm.name"
                                    :error="patientForm.errors.name"
                                    id="name"
                                    required/>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <ehr-input
                                    label="Email"
                                    :class="'text-theme-3 font-medium'"
                                    v-model="patientForm.email"
                                    :error="patientForm.errors.email"
                                    id="email"
                                    required/>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <ehr-input
                                    label="Full Name(s)"
                                    :class="'text-theme-3 font-medium'"
                                    v-model="patientForm.name"
                                    :error="patientForm.errors.name"
                                    id="name"
                                    required/>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <ehr-input
                                    label="Email"
                                    :class="'text-theme-3 font-medium'"
                                    v-model="patientForm.email"
                                    :error="patientForm.errors.email"
                                    id="email"
                                    required/>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="w-full flex flex-col" id="privacy">
                    <div class="flex flex-row items-center content-center text-center">
                        <div v-on:click="togglePatientSection('privacy')" v-tippy="{ arrow : true,  animation : 'perspective'}"
                             content='Toggle Privacy Section'
                             :class="selected_sections.includes('privacy') ? 'bg-green-500 border-green-700' : 'border-gray-500'"
                             class="flex justify-center border items-center text-center w-5 h-5 cursor-pointer rounded-full mr-2 transform text-white hover:scale-110">
                            <icon v-if="selected_sections.includes('privacy')" name="check" class="cursor-pointer w-6 h-6 p-0.5" />
                        </div>
                        <h3 class="text-lg font-bold text-green-500">Privacy</h3>
                    </div>
                    <div v-if="selected_sections.includes('privacy')" class="container mx-10 my-5">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-4 sm:col-span-3">
                                <ehr-input
                                    label="Full Name(s)"
                                    :class="'text-theme-3 font-medium'"
                                    v-model="patientForm.name"
                                    :error="patientForm.errors.name"
                                    id="name"
                                    required/>
                            </div>
                            <div class="col-span-4 sm:col-span-3">
                                <ehr-input
                                    label="Email"
                                    :class="'text-theme-3 font-medium'"
                                    v-model="patientForm.email"
                                    :error="patientForm.errors.email"
                                    id="email"
                                    required/>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <ehr-input
                                    label="Full Name(s)"
                                    :class="'text-theme-3 font-medium'"
                                    v-model="patientForm.name"
                                    :error="patientForm.errors.name"
                                    id="name"
                                    required/>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <ehr-input
                                    label="Email"
                                    :class="'text-theme-3 font-medium'"
                                    v-model="patientForm.email"
                                    :error="patientForm.errors.email"
                                    id="email"
                                    required/>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <ehr-input
                                    label="Full Name(s)"
                                    :class="'text-theme-3 font-medium'"
                                    v-model="patientForm.name"
                                    :error="patientForm.errors.name"
                                    id="name"
                                    required/>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <ehr-input
                                    label="Email"
                                    :class="'text-theme-3 font-medium'"
                                    v-model="patientForm.email"
                                    :error="patientForm.errors.email"
                                    id="email"
                                    required/>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="w-full flex flex-col" id="employer">
                    <div class="flex flex-row items-center content-center text-center">
                        <div v-on:click="togglePatientSection('employer')" v-tippy="{ arrow : true,  animation : 'perspective'}"
                             content='Toggle Employer Section'
                             :class="selected_sections.includes('employer') ? 'bg-green-500 border-green-700' : 'border-gray-500'"
                             class="flex justify-center border items-center text-center w-5 h-5 cursor-pointer rounded-full mr-2 transform text-white hover:scale-110">
                            <icon v-if="selected_sections.includes('employer')" name="check" class="cursor-pointer w-6 h-6 p-0.5" />
                        </div>
                        <h3 class="text-lg font-bold text-green-500">Employer</h3>
                    </div>
                    <div v-if="selected_sections.includes('employer')" class="container mx-10 my-5">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-4 sm:col-span-3">
                                <ehr-input
                                    label="Full Name(s)"
                                    :class="'text-theme-3 font-medium'"
                                    v-model="patientForm.name"
                                    :error="patientForm.errors.name"
                                    id="name"
                                    required/>
                            </div>
                            <div class="col-span-4 sm:col-span-3">
                                <ehr-input
                                    label="Email"
                                    :class="'text-theme-3 font-medium'"
                                    v-model="patientForm.email"
                                    :error="patientForm.errors.email"
                                    id="email"
                                    required/>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <ehr-input
                                    label="Full Name(s)"
                                    :class="'text-theme-3 font-medium'"
                                    v-model="patientForm.name"
                                    :error="patientForm.errors.name"
                                    id="name"
                                    required/>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <ehr-input
                                    label="Email"
                                    :class="'text-theme-3 font-medium'"
                                    v-model="patientForm.email"
                                    :error="patientForm.errors.email"
                                    id="email"
                                    required/>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <ehr-input
                                    label="Full Name(s)"
                                    :class="'text-theme-3 font-medium'"
                                    v-model="patientForm.name"
                                    :error="patientForm.errors.name"
                                    id="name"
                                    required/>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <ehr-input
                                    label="Email"
                                    :class="'text-theme-3 font-medium'"
                                    v-model="patientForm.email"
                                    :error="patientForm.errors.email"
                                    id="email"
                                    required/>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="w-full flex flex-col" id="social_stats">
                    <div class="flex flex-row items-center content-center text-center">
                        <div v-on:click="togglePatientSection('social_stats')" v-tippy="{ arrow : true,  animation : 'perspective'}"
                             content='Toggle Social Statistics Section'
                             :class="selected_sections.includes('social_stats') ? 'bg-green-500 border-green-700' : 'border-gray-500'"
                             class="flex justify-center border items-center text-center w-5 h-5 cursor-pointer rounded-full mr-2 transform text-white hover:scale-110">
                            <icon v-if="selected_sections.includes('social_stats')" name="check" class="cursor-pointer w-6 h-6 p-0.5" />
                        </div>
                        <h3 class="text-lg font-bold text-green-500">Social Statistics</h3>
                    </div>
                    <div v-if="selected_sections.includes('social_stats')" class="container mx-10 my-5">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-4 sm:col-span-3">
                                <ehr-input
                                    label="Full Name(s)"
                                    :class="'text-theme-3 font-medium'"
                                    v-model="patientForm.name"
                                    :error="patientForm.errors.name"
                                    id="name"
                                    required/>
                            </div>
                            <div class="col-span-4 sm:col-span-3">
                                <ehr-input
                                    label="Email"
                                    :class="'text-theme-3 font-medium'"
                                    v-model="patientForm.email"
                                    :error="patientForm.errors.email"
                                    id="email"
                                    required/>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <ehr-input
                                    label="Full Name(s)"
                                    :class="'text-theme-3 font-medium'"
                                    v-model="patientForm.name"
                                    :error="patientForm.errors.name"
                                    id="name"
                                    required/>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <ehr-input
                                    label="Email"
                                    :class="'text-theme-3 font-medium'"
                                    v-model="patientForm.email"
                                    :error="patientForm.errors.email"
                                    id="email"
                                    required/>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <ehr-input
                                    label="Full Name(s)"
                                    :class="'text-theme-3 font-medium'"
                                    v-model="patientForm.name"
                                    :error="patientForm.errors.name"
                                    id="name"
                                    required/>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <ehr-input
                                    label="Email"
                                    :class="'text-theme-3 font-medium'"
                                    v-model="patientForm.email"
                                    :error="patientForm.errors.email"
                                    id="email"
                                    required/>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="w-full flex flex-col" id="insurance">
                    <div class="flex flex-row items-center content-center text-center">
                        <div v-on:click="togglePatientSection('insurance')" v-tippy="{ arrow : true,  animation : 'perspective'}"
                             content='Toggle Insurance Section'
                             :class="selected_sections.includes('insurance') ? 'bg-green-500 border-green-700' : 'border-gray-500'"
                             class="flex justify-center border items-center text-center w-5 h-5 cursor-pointer rounded-full mr-2 transform text-white hover:scale-110">
                            <icon v-if="selected_sections.includes('insurance')" name="check" class="cursor-pointer w-6 h-6 p-0.5" />
                        </div>
                        <h3 class="text-lg font-bold text-green-500">Insurance</h3>
                    </div>
                    <div v-if="selected_sections.includes('insurance')" class="container mx-10 my-5">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-4 sm:col-span-3">
                                <ehr-input
                                    label="Full Name(s)"
                                    :class="'text-theme-3 font-medium'"
                                    v-model="patientForm.name"
                                    :error="patientForm.errors.name"
                                    id="name"
                                    required/>
                            </div>
                            <div class="col-span-4 sm:col-span-3">
                                <ehr-input
                                    label="Email"
                                    :class="'text-theme-3 font-medium'"
                                    v-model="patientForm.email"
                                    :error="patientForm.errors.email"
                                    id="email"
                                    required/>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <ehr-input
                                    label="Full Name(s)"
                                    :class="'text-theme-3 font-medium'"
                                    v-model="patientForm.name"
                                    :error="patientForm.errors.name"
                                    id="name"
                                    required/>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <ehr-input
                                    label="Email"
                                    :class="'text-theme-3 font-medium'"
                                    v-model="patientForm.email"
                                    :error="patientForm.errors.email"
                                    id="email"
                                    required/>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <ehr-input
                                    label="Full Name(s)"
                                    :class="'text-theme-3 font-medium'"
                                    v-model="patientForm.name"
                                    :error="patientForm.errors.name"
                                    id="name"
                                    required/>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <ehr-input
                                    label="Email"
                                    :class="'text-theme-3 font-medium'"
                                    v-model="patientForm.email"
                                    :error="patientForm.errors.email"
                                    id="email"
                                    required/>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
        </div>
    </div>
</template>

<script>
    import CustomDatePicker from "../../components/datepickers/CustomDatePicker"
    import i18n from "../../i18n"
    import DashboardLayout from "../../layouts/DashboardLayout"
    import { maxLength, required } from "vuelidate/lib/validators"
    import Multiselect from "vue-multiselect"

    export default {
        metaInfo: { title: i18n.t('menu.patient_client') },
        name: "CreatePatient",
        layout: DashboardLayout,
        props: {
            patient: {
                type: Object,
                default: null
            },
            facilities: Array
        },
        components: {
            CustomDatePicker,
            Multiselect,
        },
        data() {
            return {
                selected_sections: ['face_sheet'],
                current_step: 1,
                sending: false,
                pagesRoutes: [
                    {
                        title : i18n.t('menu.patient_client'),
                        link : this.route('patients.index')
                    },
                ],
                activeLink: 'Add Patients/Clients',
                initialPhone: '+237670518086',
                patientForm: this.$inertia.form({
                    name: null
                }),
                step1: {
                    title: null,
                    facility: null,
                    description: null,
                },
                step2: {
                    price: null,
                },
                step3: {
                    images: [],
                },
                errors: {},
            };
        },
        validations() {
            let self = this;
            return {
                step1: {
                    title: {
                        required,
                        maxLength: maxLength(230)
                    },
                    facility: {
                        required,
                    },
                    description: {
                        required,
                    },
                },
                step2: {
                    price: {
                        required,
                    }
                },
                step3: {
                    images: {
                        required,
                    }
                },
                validationGroup: ['step1', 'step2', 'step3']
            }
        },
        methods: {
            togglePatientSection(section) {
                let sectionIndex = this.selected_sections.indexOf(section)
                if (sectionIndex === -1) {
                    this.selected_sections.push(section)
                } else {
                    this.selected_sections.splice(sectionIndex, 1)
                }
            },
            submit() {
                this.$v.$touch()
                if (this.$v.$invalid) {
                    this.submitStatus = false
                    this.$nextTick(() => {
                        let objetRect = document.querySelector('.form-error').getBoundingClientRect();
                        window.scrollTo(
                            objetRect.left + document.documentElement.scrollLeft,
                            objetRect.top + document.documentElement.scrollTop
                        )
                    })
                } else {
                    this.submitStatus = true
                    console.log("Submitting form")
                }
            },
            gotoNextStep() {
                let next_step = this.current_step + 1
                if (next_step === 2) {
                    this.$v.validationGroup.step1.$touch()
                    if (!this.$v.validationGroup.step1.$invalid) {
                        this.current_step ++
                    }
                } else if (next_step === 3) {
                    this.$v.validationGroup.step2.$touch()
                    if (!this.$v.validationGroup.step2.$invalid) {
                        this.current_step ++
                    }
                } else if (next_step === 4) {
                    this.$v.validationGroup.step3.$touch()
                    if (!this.$v.validationGroup.step3.$invalid) {
                        this.current_step ++
                    }
                }
            },
            gotoPreviousStep() {
                this.current_step --
            },
        },
    }
</script>

<style scoped lang="scss">
.sub-label {
    @apply text-gray-700 font-medium italic;
}
.help {
    @apply block text-xs mt-1 italic mx-0;
}
.step {
    content: "";
    width: 30%;
    display: inline-block;
    &{
        @apply h-1 rounded-lg;
    }
    &:not(.active){
        @apply bg-gray-100;
    }
    &.active{
        @apply bg-green-200;
    }
}
</style>
