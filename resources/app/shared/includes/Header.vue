<template>
    <nav
        class="sticky top-0 flex flex-col w-full text-gray-100 bg-gray-900 border-t border-t-2 border-r border-theme-2 body-font shadow z-50"
    >
        <div class="w-full items-center">
            <div class="transition duration-500 ease-in-out transform">
                <div
                    class="flex sm:flex-row flex-wrap p-2 md:items-center md:flex-row"
                >
                    <inertia-link
                        :href="route('dashboard.index')"
                        class="p-1 mx-2 border-transparent text-gray-400 rounded-full hover:text-white bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700"
                    >
                     <icon name="home-icon" class="w-6 h-6" />
                    </inertia-link>

                    <nav
                        class=" dark flex flex-wrap items-center text-base md:ml-0 space-x-1"
                    >
                    <button

                            class="block lg:hidden text-white hover:text-gray-200 focus:text-gray-200 focus:outline-none"
                            type="button" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation" aria-controls="drawer-navigation"
                        >
                            <span class="inline-block align-middle">
                                <icon name="hamburger" class="w-6 h-6"/>
                            </span>
                        </button>



<!-- drawer init and show -->
<!-- <div class="text-center">
   <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation" aria-controls="drawer-navigation">
   Show navigation
   </button>
</div> -->

<!-- drawer component -->
<div id="drawer-navigation" class="dark fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-navigation-label">
    <h5 id="drawer-navigation-label" class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400">Menu</h5>
    <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Close menu</span>
    </button>
  <div class="py-4 overflow-y-auto">
      <ul class="space-y-2 font-medium ">
<li>
   <div class="flex items-center p-2 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
      <span class="inline-block align-middle mr-3">
         <icon name="calendar" class="w-6 h-6" />
      </span>
      <inertia-link
         :href="route('dashboard.calendar')"
         :class="isActiveClass('dashboard.calendar') ? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'"
         >
         {{ $t("menu.calendar") }}
      </inertia-link>
   </div>
</li>
<li>
   <div class="flex items-center p-2 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
      <span class="inline-block align-middle mr-3">
         <icon name="dashboard" class="w-6 h-6" />
      </span>
      <inertia-link
                                :href="route('dashboard.flow_board')"
                                :class="isActiveClass('dashboard.flow_board')? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'"
                            >
                                {{ $t("menu.flow_board") }}
                            </inertia-link>
   </div>
</li>
         <li>
            <button type="button" class="flex p-2 items-center w-full text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-patient" data-collapse-toggle="dropdown-patient">
                 <icon name="users" class="w-6 h-6" />
                  <span class="flex-1 ml-3 text-left whitespace-nowrap">{{ $t("menu.patient_client") }}</span>
                  <icon name="chevron-down" class="w-6 h-6 fill-current" />
            </button>
            <ul id="dropdown-patient" class="hidden py-2 space-y-2 ml-2">
                  <li>
                    <inertia-link
                                        :href="
                                            route('dashboard.patients.index')
                                        "
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.patients.index'
                                            )? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'
                                        "
                                        >Finder
                                    </inertia-link>
                  </li>
                  <li>
                    <inertia-link
                                        :href="
                                            route('dashboard.patients.create')
                                        "
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.patients.create'
                                            )? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'
                                        "
                                        >Add New/Search
                                    </inertia-link>
                  </li>
                  <li>
                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'
                                        "
                                        >Recycle Bin
                                    </inertia-link>
                  </li>
                  <li>
                    <inertia-link
                                        v-if="
                                            $page.props.ehr_patient.patient !=
                                            null
                                        "
                                        :href="
                                            route(
                                                'dashboard.patients.select',
                                                $page.props.ehr_patient.patient
                                                    .id
                                            )
                                        "
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'
                                        "
                                        >Summary
                                    </inertia-link>

                  </li>
                  <li>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'
                                        "
                                        >Track Appointments
                                    </inertia-link>
                                </li>
                            <li>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'
                                        "
                                        >Visits
                                    </inertia-link>
                                </li>
                            <li>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'
                                        "
                                        >Records
                                    </inertia-link>
                                </li>
                            <li>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'
                                        "
                                        >Visit Forms
                                    </inertia-link>
                                </li>
                                <li>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'
                                        "
                                        >Imports
                                    </inertia-link>
                                </li>
            </ul>
         </li>


         <li>
            <button type="button" class="flex p-2 items-center w-full text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-fees" data-collapse-toggle="dropdown-fees">
                 <icon name="money" class="w-6 h-6" />
                  <span class="flex-1 ml-3 text-left whitespace-nowrap">{{ $t("menu.fees") }}</span>
                  <icon name="chevron-down" class="w-6 h-6 fill-current" />
            </button>
            <ul id="dropdown-fees" class="hidden py-2 space-y-2 ml-2">

  <li>
    <inertia-link
      :href="'#'"
      :class="isSubMenuActive('patients.index') ? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'"
    >
      Fee Sheet
    </inertia-link>
  </li>
  <li>
    <inertia-link
      :href="'#'"
      :class="isSubMenuActive('patients.create') ? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'"
    >
      Payment
    </inertia-link>
  </li>
  <li>
    <inertia-link
      :href="route('dashboard.settings')"
      :class="isSubMenuActive('dashboard.settings') ? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'"
    >
      Checkout
    </inertia-link>
  </li>
  <li>
    <inertia-link
      :href="route('dashboard.settings')"
      :class="isSubMenuActive('dashboard.settings') ? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'"
    >
      Billing
    </inertia-link>
  </li>
  <li>
    <inertia-link
      :href="route('dashboard.settings')"
      :class="isSubMenuActive('dashboard.settings') ? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'"
    >
      Posting
    </inertia-link>
  </li>
  <li>
    <inertia-link
      :href="route('dashboard.settings')"
      :class="isSubMenuActive('dashboard.settings') ? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'"
    >
      Batch Payments
    </inertia-link>
  </li>
  <li>
    <inertia-link
      :href="route('dashboard.settings')"
      :class="isSubMenuActive('dashboard.settings') ? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'"
    >
      Verify Patient Data
    </inertia-link>
  </li>
  <li>
    <inertia-link
      :href="route('dashboard.settings')"
      :class="isSubMenuActive('dashboard.settings') ? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'"
    >
      EDI History
    </inertia-link>
  </li>
</ul>


         </li>






         <li>
            <button type="button" class="flex p-2 items-center w-full text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-inventory" data-collapse-toggle="dropdown-inventory">
                 <icon name="inventory" class="w-6 h-6" />
                  <span class="flex-1 ml-3 text-left whitespace-nowrap">{{ $t("menu.inventory") }}</span>
                  <icon name="chevron-down" class="w-6 h-6 fill-current" />
            </button>
            <ul id="dropdown-inventory" class="hidden py-2 space-y-2 ml-2">


  <li>
    <inertia-link
      :href="'#'"
      :class="isSubMenuActive('patients.index') ? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'"
    >
      Management
    </inertia-link>
  </li>
  <li>
    <inertia-link
      :href="'#'"
      :class="isSubMenuActive('patients.create') ? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'"
    >
      Destroyed
    </inertia-link>
  </li>
</ul>
         </li>

         <li>
            <button type="button" class="flex p-2 items-center w-full text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-procedures" data-collapse-toggle="dropdown-procedures">
                 <icon name="procedures" class="w-6 h-6" />
                  <span class="flex-1 ml-3 text-left whitespace-nowrap">{{ $t("menu.procedures") }}</span>
                  <icon name="chevron-down" class="w-6 h-6 fill-current" />
            </button>
            <ul id="dropdown-procedures" class="hidden py-2 space-y-2 ml-2">


                <li>
    <inertia-link
      :href="'#'"
      :class="isSubMenuActive('patients.index') ? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'"
    >
      Providers
    </inertia-link>
  </li>
  <li>
    <inertia-link
      :href="'#'"
      :class="isSubMenuActive('patients.create') ? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'"
    >
      Configuration
    </inertia-link>
  </li>
  <li>
    <inertia-link
      :href="route('dashboard.settings')"
      :class="isSubMenuActive('dashboard.settings') ? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'"
    >
      Load Compendium
    </inertia-link>
  </li>
  <li>
    <inertia-link
      :href="route('dashboard.settings')"
      :class="isSubMenuActive('dashboard.settings') ? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'"
    >
      Pending Review
    </inertia-link>
  </li>
  <li>
    <inertia-link
      :href="route('dashboard.settings')"
      :class="isSubMenuActive('dashboard.settings') ? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'"
    >
      Patient Results
    </inertia-link>
  </li>
  <li>
    <inertia-link
      :href="route('dashboard.settings')"
      :class="isSubMenuActive('dashboard.settings') ? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'"
    >
      Lab Results
    </inertia-link>
  </li>
  <li>
    <inertia-link
      :href="route('dashboard.settings')"
      :class="isSubMenuActive('dashboard.settings') ? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'"
    >
      Electronic Reports
    </inertia-link>
  </li>
  <li>
    <inertia-link
      :href="route('dashboard.settings')"
      :class="isSubMenuActive('dashboard.settings') ? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'"
    >
      Lab Documents
    </inertia-link>
  </li>
</ul>
         </li>

         <li>
            <button type="button" class="flex p-2 items-center w-full text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-admin" data-collapse-toggle="dropdown-admin">
                 <icon name="admin" class="w-6 h-6" />
                  <span class="flex-1 ml-3 text-left whitespace-nowrap">{{ $t("menu.administration") }}</span>
                  <icon name="chevron-down" class="w-6 h-6 fill-current" />
            </button>
            <ul id="dropdown-admin" class="hidden py-2 space-y-2 ml-2">


                <li>
    <inertia-link
      :href="'#'"
      :class="
        isSubMenuActive('patients.index')
        ? 'text-gray-900 dark:text-white'
        : 'text-gray-400 dark:text-gray-400'
      "
    >
      Providers
    </inertia-link>
  </li>
  <li>
    <inertia-link
      :href="'#'"
      :class="
        isSubMenuActive('patients.create')
        ? 'text-gray-900 dark:text-white'
        : 'text-gray-400 dark:text-gray-400'
      "
    >
      Configuration
    </inertia-link>
  </li>
  <li>
    <inertia-link
      :href="route('dashboard.settings')"
      :class="
        isSubMenuActive('dashboard.settings')
        ? 'text-gray-900 dark:text-white'
        : 'text-gray-400 dark:text-gray-400'
      "
    >
      Load Compendium
    </inertia-link>
  </li>
  <li>
    <inertia-link
      :href="route('dashboard.settings')"
      :class="
        isSubMenuActive('dashboard.settings')
        ? 'text-gray-900 dark:text-white'
        : 'text-gray-400 dark:text-gray-400'
      "
    >
      Pending Review
    </inertia-link>
  </li>
  <li>
    <inertia-link
      :href="route('dashboard.settings')"
      :class="
        isSubMenuActive('dashboard.settings')
        ? 'text-gray-900 dark:text-white'
        : 'text-gray-400 dark:text-gray-400'
      "
    >
      Patient Results
    </inertia-link>
  </li>
  <li>
    <inertia-link
      :href="route('dashboard.settings')"
      :class="
        isSubMenuActive('dashboard.settings')
        ? 'text-gray-900 dark:text-white'
        : 'text-gray-400 dark:text-gray-400'
      "
    >
      Lab Results
    </inertia-link>
  </li>
  <li>
    <inertia-link
      :href="route('dashboard.settings')"
      :class="
        isSubMenuActive('dashboard.settings')
        ? 'text-gray-900 dark:text-white'
        : 'text-gray-400 dark:text-gray-400'
      "
    >
      Electronic Reports
    </inertia-link>
  </li>
  <li>
    <inertia-link
      :href="route('dashboard.settings')"
      :class="
        isSubMenuActive('dashboard.settings')
        ? 'text-gray-900 dark:text-white'
        : 'text-gray-400 dark:text-gray-400'
      "
    >
      Lab Documents
    </inertia-link>
  </li>
</ul>
         </li>

         <li>
            <button type="button" class="flex p-2 items-center w-full text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-reports" data-collapse-toggle="dropdown-reports">
                 <icon name="procedures" class="w-6 h-6" />
                  <span class="flex-1 ml-3 text-left whitespace-nowrap">{{ $t("menu.reports") }}</span>
                  <icon name="chevron-down" class="w-6 h-6 fill-current" />
            </button>
            <ul id="dropdown-reports" class="hidden py-2 space-y-2 ml-2">


                <li>
        <inertia-link
            :href="'#'"
            :class="
                isSubMenuActive('patients.index') ? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'
            "
        >Clients
        </inertia-link>
    </li>
    <li>
        <inertia-link
            :href="'#'"
            :class="
                isSubMenuActive('patients.create') ? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'
            "
        >Visits
        </inertia-link>
    </li>
    <li>
        <inertia-link
            :href="route('dashboard.settings')"
            :class="
                isSubMenuActive('dashboard.settings') ? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'
            "
        >Financial
        </inertia-link>
    </li>
    <li>
        <inertia-link
            :href="route('dashboard.settings')"
            :class="
                isSubMenuActive('dashboard.settings') ? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'
            "
        >Inventory
        </inertia-link>
    </li>
    <li>
        <inertia-link
            :href="route('dashboard.settings')"
            :class="
                isSubMenuActive('dashboard.settings') ? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'
            "
        >Procedures
        </inertia-link>
    </li>
    <li>
        <inertia-link
            :href="route('dashboard.settings')"
            :class="
                isSubMenuActive('dashboard.settings') ? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'
            "
        >Insurance
        </inertia-link>
    </li>
    <li>
        <inertia-link
            :href="route('dashboard.settings')"
            :class="
                isSubMenuActive('dashboard.settings') ? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'
            "
        >Blank Forms
        </inertia-link>
    </li>
    <li>
        <inertia-link
            :href="route('dashboard.settings')"
            :class="
                isSubMenuActive('dashboard.settings') ? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-400'
            "
        >Services
        </inertia-link>
    </li>
</ul>
         </li>


         <li>
            <button type="button" class="flex p-2 items-center w-full text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-misc" data-collapse-toggle="dropdown-misc">
                 <icon name="misc" class="w-6 h-6" />
                  <span class="flex-1 ml-3 text-left whitespace-nowrap">{{ $t("menu.miscellaneous") }}</span>
                  <icon name="chevron-down" class="w-6 h-6 fill-current" />
            </button>
            <ul id="dropdown-misc" class="hidden py-2 space-y-2 ml-2">


                <li>
        <inertia-link
            :href="'#'"
            :class="
                isSubMenuActive('patients.index')
                    ? 'text-gray-900 dark:text-white'
                    : 'text-gray-400 dark:text-gray-400'
            "
        >
            Patient Education
        </inertia-link>
    </li>
    <li>
        <inertia-link
            :href="'#'"
            :class="
                isSubMenuActive('patients.create')
                    ? 'text-gray-900 dark:text-white'
                    : 'text-gray-400 dark:text-gray-400'
            "
        >
            Patient Portal
        </inertia-link>
    </li>
    <li>
        <inertia-link
            :href="route('dashboard.settings')"
            :class="
                isSubMenuActive('dashboard.settings')
                    ? 'text-gray-900 dark:text-white'
                    : 'text-gray-400 dark:text-gray-400'
            "
        >
            Authorizations
        </inertia-link>
    </li>
    <li>
        <inertia-link
            :href="route('dashboard.settings')"
            :class="
                isSubMenuActive('dashboard.settings')
                    ? 'text-gray-900 dark:text-white'
                    : 'text-gray-400 dark:text-gray-400'
            "
        >
            Address Book
        </inertia-link>
    </li>
    <li>
        <inertia-link
            :href="route('dashboard.settings')"
            :class="
                isSubMenuActive('dashboard.settings')
                    ? 'text-gray-900 dark:text-white'
                    : 'text-gray-400 dark:text-gray-400'
            "
        >
            Order Catalog
        </inertia-link>
    </li>
    <li>
        <inertia-link
            :href="route('dashboard.settings')"
            :class="
                isSubMenuActive('dashboard.settings')
                    ? 'text-gray-900 dark:text-white'
                    : 'text-gray-400 dark:text-gray-400'
            "
        >
            BatchCom
        </inertia-link>
    </li>
    <li>
        <inertia-link
            :href="route('dashboard.settings')"
            :class="
                isSubMenuActive('dashboard.settings')
                    ? 'text-gray-900 dark:text-white'
                    : 'text-gray-400 dark:text-gray-400'
            "
        >
            Preferences
        </inertia-link>
    </li>
    <li>
        <inertia-link
            :href="route('dashboard.settings')"
            :class="
                isSubMenuActive('dashboard.settings')
                    ? 'text-gray-900 dark:text-white'
                    : 'text-gray-400 dark:text-gray-400'
            "
        >
            New Documents
        </inertia-link>
    </li>
    <li>
        <inertia-link
            :href="route('dashboard.settings')"
            :class="
                isSubMenuActive('dashboard.settings')
                    ? 'text-gray-900 dark:text-white'
                    : 'text-gray-400 dark:text-gray-400'
            "
        >
            Utilities
        </inertia-link>
    </li>
    <li>
        <inertia-link
            :href="route('dashboard.settings')"
            :class="
                isSubMenuActive('dashboard.settings')
                    ? 'text-gray-900 dark:text-white'
                    : 'text-gray-400 dark:text-gray-400'
            "
        >
            Document Templates
        </inertia-link>
    </li>
</ul>
         </li>


         <li>
            <button type="button" class="flex p-2 items-center w-full text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-popups" data-collapse-toggle="dropdown-popups">
                 <icon name="pop-ups" class="w-6 h-6" />
                  <span class="flex-1 ml-3 text-left whitespace-nowrap">{{ $t("menu.popups") }}</span>
                  <icon name="chevron-down" class="w-6 h-6 fill-current" />
            </button>
            <ul id="dropdown-popups" class="hidden py-2 space-y-2 ml-2">


                <li>
    <inertia-link
        :href="'#'"
        :class="
            isSubMenuActive('patients.index')
                ? 'text-gray-900 dark:text-white'
                : 'text-gray-400 dark:text-gray-400'
        "
    >
        Issues
    </inertia-link>
</li>
<li>
    <inertia-link
        :href="'#'"
        :class="
            isSubMenuActive('patients.create')
                ? 'text-gray-900 dark:text-white'
                : 'text-gray-400 dark:text-gray-400'
        "
    >
        Appts
    </inertia-link>
</li>
<li>
    <inertia-link
        :href="route('dashboard.settings')"
        :class="
            isSubMenuActive('dashboard.settings')
                ? 'text-gray-900 dark:text-white'
                : 'text-gray-400 dark:text-gray-400'
        "
    >
        Superbill
    </inertia-link>
</li>
<li>
    <inertia-link
        :href="route('dashboard.settings')"
        :class="
            isSubMenuActive('dashboard.settings')
                ? 'text-gray-900 dark:text-white'
                : 'text-gray-400 dark:text-gray-400'
        "
    >
        Payment
    </inertia-link>
</li>
<li>
    <inertia-link
        :href="route('dashboard.settings')"
        :class="
            isSubMenuActive('dashboard.settings')
                ? 'text-gray-900 dark:text-white'
                : 'text-gray-400 dark:text-gray-400'
        "
    >
        Letter
    </inertia-link>
</li>
<li>
    <inertia-link
        :href="route('dashboard.patients.chart_label', patient_id)"
        :class="
            isSubMenuActive('dashboard.patients.chart_label')
                ? 'text-gray-900 dark:text-white'
                : 'text-gray-400 dark:text-gray-400'
        "
    >
        Chart Label
    </inertia-link>
</li>
<li>
    <inertia-link
        :href="route('dashboard.settings')"
        :class="
            isSubMenuActive('dashboard.settings')
                ? 'text-gray-900 dark:text-white'
                : 'text-gray-400 dark:text-gray-400'
        "
    >
        Barcode Label
    </inertia-link>
</li>
<li>
    <inertia-link
        :href="route('dashboard.settings')"
        :class="
            isSubMenuActive('dashboard.settings')
                ? 'text-gray-900 dark:text-white'
                : 'text-gray-400 dark:text-gray-400'
        "
    >
        Address Label
    </inertia-link>
</li>
</ul>
         </li>

         <li>
            <button type="button" class="flex p-2 items-center w-full text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-qa" data-collapse-toggle="dropdown-qa">
                 <icon name="QnA" class="w-6 h-6" />
                  <span class="flex-1 ml-3 text-left whitespace-nowrap">{{ $t("menu.qa_measures") }}</span>
                  <icon name="chevron-down" class="w-6 h-6 fill-current" />
            </button>
            <ul id="dropdown-qa" class="hidden py-2 space-y-2 ml-2">


                <li>
        <inertia-link
            :href="'#'"
            :class="
                isSubMenuActive('patients.index')
                    ? 'text-gray-900 dark:text-white'
                    : 'text-gray-400 dark:text-gray-400'
            "
        >View Reports
        </inertia-link>
    </li>
    <li>
        <inertia-link
            :href="'#'"
            :class="
                isSubMenuActive('patients.create')
                    ? 'text-gray-900 dark:text-white'
                    : 'text-gray-400 dark:text-gray-400'
            "
        >Create MIPS Report
        </inertia-link>
    </li>
    <li>
        <inertia-link
            :href="route('dashboard.settings')"
            :class="
                isSubMenuActive('dashboard.settings')
                    ? 'text-gray-900 dark:text-white'
                    : 'text-gray-400 dark:text-gray-400'
            "
        >Select Measures
        </inertia-link>
    </li>
    <li>
        <inertia-link
            :href="route('dashboard.settings')"
            :class="
                isSubMenuActive('dashboard.settings')
                    ? 'text-gray-900 dark:text-white'
                    : 'text-gray-400 dark:text-gray-400'
            "
        >Upload Claim Files
        </inertia-link>
    </li>
    <li>
        <inertia-link
            :href="route('dashboard.settings')"
            :class="
                isSubMenuActive('dashboard.settings')
                    ? 'text-gray-900 dark:text-white'
                    : 'text-gray-400 dark:text-gray-400'
            "
        >Instance Counts
        </inertia-link>
    </li>
    <li>
        <inertia-link
            :href="route('dashboard.settings')"
            :class="
                isSubMenuActive('dashboard.settings')
                    ? 'text-gray-900 dark:text-white'
                    : 'text-gray-400 dark:text-gray-400'
            "
        >Remove Provider Assignments
        </inertia-link>
    </li>
    <li>
        <inertia-link
            :href="route('dashboard.settings')"
            :class="
                isSubMenuActive('dashboard.settings')
                    ? 'text-gray-900 dark:text-white'
                    : 'text-gray-400 dark:text-gray-400'
            "
        >Provider Encounter Counts
        </inertia-link>
    </li>
    <li>
        <inertia-link
            :href="route('dashboard.settings')"
            :class="
                isSubMenuActive('dashboard.settings')
                    ? 'text-gray-900 dark:text-white'
                    : 'text-gray-400 dark:text-gray-400'
            "
        >Database Imports
        </inertia-link>
    </li>
    <li>
        <inertia-link
            :href="route('dashboard.settings')"
            :class="
                isSubMenuActive('dashboard.settings')
                    ? 'text-gray-900 dark:text-white'
                    : 'text-gray-400 dark:text-gray-400'
            "
        >Database Inserts
        </inertia-link>
    </li>
    <li>
        <inertia-link
            :href="route('dashboard.settings')"
            :class="
                isSubMenuActive('dashboard.settings')
                    ? 'text-gray-900 dark:text-white'
                    : 'text-gray-400 dark:text-gray-400'
            "
        >MIPS Module Installer
        </inertia-link>
    </li>
    <li>
        <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )? 'text-gray-900 dark:text-white'
                                            : 'text-gray-400 dark:text-gray-400'
                                        "
                                        >Alert Logs
                                    </inertia-link>
    </li>
</ul>
         </li>

         <li>
            <button type="button" class="flex p-2 items-center w-full text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-help" data-collapse-toggle="dropdown-help">
                 <icon name="help" class="w-6 h-6" />
                  <span class="flex-1 ml-3 text-left whitespace-nowrap">{{ $t("menu.help") }}</span>
                  <icon name="chevron-down" class="w-6 h-6 fill-current" />
            </button>
            <ul id="dropdown-help" class="hidden py-2 space-y-2 ml-2">

<li>
                <inertia-link
                                        :href="route('about')"
                                        :class="isSubMenuActive('about')? 'text-gray-900 dark:text-white'
                                            : 'text-gray-400 dark:text-gray-400'"
                                        >About
                                    </inertia-link></li><li>
                                    <inertia-link
                                        :href="'#'"
                                        :class="
                                            isSubMenuActive('patients.create')? 'text-gray-900 dark:text-white'
                                            : 'text-gray-400 dark:text-gray-400'
                                        "
                                        >Forums
                                    </inertia-link></li><li>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )? 'text-gray-900 dark:text-white'
                                            : 'text-gray-400 dark:text-gray-400'
                                        "
                                        >Chat
                                    </inertia-link></li><li>
                                    <inertia-link
                                        :href="route('contact')"
                                        :class="isSubMenuActive('contact')? 'text-gray-900 dark:text-white'
                                            : 'text-gray-400 dark:text-gray-400'"
                                        >Contact
                                    </inertia-link></li>
</ul>
         </li>



      </ul>
   </div>
</div>






                        <div
                            class="hidden md:block sm:block w-full bg-gray-700 flex flex-wrap p-2 m-2 gap-1"

                        >
                            <inertia-link
                                :href="route('dashboard.calendar')"
                                :class="isActiveClass('dashboard.calendar')"
                            >
                                {{ $t("menu.calendar") }}
                            </inertia-link>
                            <inertia-link
                                :href="route('dashboard.flow_board')"
                                :class="isActiveClass('dashboard.flow_board')"
                            >
                                {{ $t("menu.flow_board") }}
                            </inertia-link>
                            <ehr-header-menu :label="$t('menu.patient_client')">
                                <div class="flex flex-col">
                                    <inertia-link
                                        :href="
                                            route('dashboard.patients.index')
                                        "
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.patients.index'
                                            )
                                        "
                                        >Finder
                                    </inertia-link>
                                    <inertia-link
                                        :href="
                                            route('dashboard.patients.create')
                                        "
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.patients.create'
                                            )
                                        "
                                        >Add New/Search
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Recycle Bin
                                    </inertia-link>
                                    <inertia-link
                                        v-if="
                                            $page.props.ehr_patient.patient !=
                                            null
                                        "
                                        :href="
                                            route(
                                                'dashboard.patients.select',
                                                $page.props.ehr_patient.patient
                                                    .id
                                            )
                                        "
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Summary
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Track Appointments
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Visits
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Records
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Visit Forms
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Imports
                                    </inertia-link>
                                </div>
                            </ehr-header-menu>
                            <ehr-header-menu :label="$t('menu.fees')">
                                <div class="flex flex-col">
                                    <inertia-link
                                        :href="'#'"
                                        :class="
                                            isSubMenuActive('patients.index')
                                        "
                                        >Fee Sheet
                                    </inertia-link>
                                    <inertia-link
                                        :href="'#'"
                                        :class="
                                            isSubMenuActive('patients.create')
                                        "
                                        >Payment
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Checkout
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Billing
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Posting
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Batch Payments
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Verify Patient Data
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >EDI History
                                    </inertia-link>
                                </div>
                            </ehr-header-menu>
                            <ehr-header-menu :label="$t('menu.inventory')">
                                <div class="flex flex-col">
                                    <inertia-link
                                        :href="'#'"
                                        :class="
                                            isSubMenuActive('patients.index')
                                        "
                                        >Management
                                    </inertia-link>
                                    <inertia-link
                                        :href="'#'"
                                        :class="
                                            isSubMenuActive('patients.create')
                                        "
                                        >Destroyed
                                    </inertia-link>
                                </div>
                            </ehr-header-menu>
                            <ehr-header-menu :label="$t('menu.procedures')">
                                <div class="flex flex-col">
                                    <inertia-link
                                        :href="'#'"
                                        :class="
                                            isSubMenuActive('patients.index')
                                        "
                                        >Providers
                                    </inertia-link>
                                    <inertia-link
                                        :href="'#'"
                                        :class="
                                            isSubMenuActive('patients.create')
                                        "
                                        >Configuration
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Load Compendium
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Pending Review
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Patient Results
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Lab Results
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Electronic Reports
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Lab Documents
                                    </inertia-link>
                                </div>
                            </ehr-header-menu>
                            <ehr-header-menu :label="$t('menu.administration')">
                                <div class="flex flex-col">
                                    <inertia-link
                                        :href="'#'"
                                        :class="
                                            isSubMenuActive('patients.index')
                                        "
                                        >Providers
                                    </inertia-link>
                                    <inertia-link
                                        :href="'#'"
                                        :class="
                                            isSubMenuActive('patients.create')
                                        "
                                        >Configuration
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Load Compendium
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Pending Review
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Patient Results
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Lab Results
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Electronic Reports
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Lab Documents
                                    </inertia-link>
                                </div>
                            </ehr-header-menu>
                            <ehr-header-menu :label="$t('menu.reports')">
                                <div class="flex flex-col">
                                    <inertia-link
                                        :href="'#'"
                                        :class="
                                            isSubMenuActive('patients.index')
                                        "
                                        >Clients
                                    </inertia-link>
                                    <inertia-link
                                        :href="'#'"
                                        :class="
                                            isSubMenuActive('patients.create')
                                        "
                                        >Visits
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Financial
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Inventory
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Procedures
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Insurance
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Blank Forms
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Services
                                    </inertia-link>
                                </div>
                            </ehr-header-menu>
                            <ehr-header-menu :label="$t('menu.miscellaneous')">
                                <div class="flex flex-col">
                                    <inertia-link
                                        :href="'#'"
                                        :class="
                                            isSubMenuActive('patients.index')
                                        "
                                        >Patient Education
                                    </inertia-link>
                                    <inertia-link
                                        :href="'#'"
                                        :class="
                                            isSubMenuActive('patients.create')
                                        "
                                        >Patient Portal
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Authorizations
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Address Book
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Order Catalog
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >BatchCom
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Preferences
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >New Documents
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Utilities
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Document Templates
                                    </inertia-link>
                                </div>
                            </ehr-header-menu>
                            <ehr-header-menu :label="$t('menu.popups')">
                                <div class="flex flex-col">
                                    <inertia-link
                                        :href="'#'"
                                        :class="
                                            isSubMenuActive('patients.index')
                                        "
                                        >Issues
                                    </inertia-link>
                                    <inertia-link
                                        :href="'#'"
                                        :class="
                                            isSubMenuActive('patients.create')
                                        "
                                        >Appts
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Superbill
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Payment
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Letter
                                    </inertia-link>
                                    <inertia-link
                                        :href="
                                            route(
                                                'dashboard.patients.chart_label',
                                                patient_id
                                            )
                                        "
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.patients.chart_label'
                                            )
                                        "
                                        >Chart Label
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Barcode Label
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Address Label
                                    </inertia-link>
                                </div>
                            </ehr-header-menu>
                            <ehr-header-menu :label="$t('menu.qa_measures')">
                                <div class="flex flex-col">
                                    <inertia-link
                                        :href="'#'"
                                        :class="
                                            isSubMenuActive('patients.index')
                                        "
                                        >View Reports
                                    </inertia-link>
                                    <inertia-link
                                        :href="'#'"
                                        :class="
                                            isSubMenuActive('patients.create')
                                        "
                                        >Create MIPS Report
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Select Measures
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Upload Claim Files
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Instance Counts
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Remove Provider Assignments
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Provider Encounter Counts
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Database Imports
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Database Inserts
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >MIPS Module Installer
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Alert Logs
                                    </inertia-link>
                                </div>
                            </ehr-header-menu>
                            <ehr-header-menu :label="$t('menu.help')">
                                <div class="flex flex-col">
                                    <inertia-link
                                        :href="route('about')"
                                        :class="isSubMenuActive('about')"
                                        >About
                                    </inertia-link>
                                    <inertia-link
                                        :href="'#'"
                                        :class="
                                            isSubMenuActive('patients.create')
                                        "
                                        >Forums
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('dashboard.settings')"
                                        :class="
                                            isSubMenuActive(
                                                'dashboard.settings'
                                            )
                                        "
                                        >Chat
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('contact')"
                                        :class="isSubMenuActive('contact')"
                                        >Contact
                                    </inertia-link>
                                </div>
                            </ehr-header-menu>
                        </div>
                    </nav>
                    <div
                        class="absolute right-10 flex flex-wrap ltr:justify-end rtl:justify-end ml-auto xl:flex-nowrap md:flex-nowrap lg:flex-wrap"
                    >
                        <div class="md:block ml-2">
                            <div class="flex items-center md:ml-4">
                                <LanguageSwitcher
                                    :drop-down-color="'text-white'"
                                />
                                <button
                                    class="p-2 border-transparent text-gray-400 rounded-full hover:text-white focus:outline-none focus:text-white focus:bg-gray-700"
                                >
                                   <icon name="chat-bubble" />
                                </button>
                                <div class="ml-1 relative">
                                    <div>
                                        <div
                                            v-if="open"
                                            @click="open = false"
                                            class="fixed inset-0"
                                        ></div>
                                        <button
                                            @click="open = !open"
                                            class="max-w-xs flex items-center text-sm rounded-full text-white focus:outline-none outline-none"
                                        >
                                            <div class="relative w-8 h-8">
                                                <img
                                                    class="rounded-full border border-1 border-gray-50 shadow-sm"
                                                    src="/images/avatars/admin.png"
                                                    alt="user image"
                                                />
                                            </div>
                                        </button>
                                    </div>
                                    <transition
                                        enter-active-class="transition-all transition-fastest ease-out-quad"
                                        leave-active-class="transition-all transition-faster ease-in-quad"
                                        enter-class="opacity-0 scale-70"
                                        enter-to-class="opacity-100 scale-100"
                                        leave-class="opacity-100 scale-100"
                                        leave-to-class="opacity-0 scale-70"
                                    >
                                        <div
                                            v-if="open"
                                            class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg z-9999"
                                        >
                                            <div
                                                class="py-1 rounded-md bg-white shadow-xs z-9999"
                                            >
                                                <inertia-link
                                                    :href="
                                                        route(
                                                            'dashboard.profile'
                                                        )
                                                    "
                                                    :class="
                                                        isSubMenuActive(
                                                            'dashboard.profile'
                                                        )
                                                    "
                                                >
                                                    {{
                                                        $page.props.auth.user
                                                            .first_name +
                                                        " " +
                                                        $page.props.auth.user
                                                            .last_name
                                                    }}
                                                </inertia-link>
                                                <inertia-link
                                                    :href="
                                                        route(
                                                            'dashboard.profile'
                                                        )
                                                    "
                                                    :class="
                                                        isSubMenuActive(
                                                            'dashboard.profile'
                                                        )
                                                    "
                                                >
                                                    Your Profile
                                                </inertia-link>

                                                <inertia-link
                                                    :href="
                                                        route(
                                                            'dashboard.settings'
                                                        )
                                                    "
                                                    :class="
                                                        isSubMenuActive(
                                                            'dashboard.settings'
                                                        )
                                                    "
                                                >
                                                    Settings
                                                </inertia-link>
                                                <inertia-link
                                                    :href="route('logout')"
                                                    method="post"
                                                    :class="
                                                        isSubMenuActive(
                                                            'logout'
                                                        )
                                                    "
                                                >
                                                    Sign out
                                                </inertia-link>
                                            </div>
                                        </div>
                                    </transition>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div
                class="flex flex-wrap sm:flex-row justify-between text-base py-2 px-4 mb-2 sm:mb-0"
            >
                <div class="flex flex-row mb-2 sm:mb-0">
                    <div
                        v-if="$page.props.ehr_patient.patient === null"
                        class="relative text-sm uppercase w-full sm:w-50"
                    >
                        <span>{{ $t("menu.patient_client") }}:</span>
                        <span class="font-bold">None</span>
                    </div>
                    <div v-else class="flex flex-row items-center space-x-2">
                        <div class="flex-shrink-0">
                            <img
                                class="w-10 h-10 rounded-full border border-gray-100"
                                src="/images/logo.png"
                                alt="Logo"
                            />
                        </div>
                        <div class="flex flex-col">
                            <div class="flex flex-row">
                                <span>{{ $t("menu.patient_client") }}:</span>
                                <inertia-link
                                    :href="
                                        route(
                                            'dashboard.patients.select',
                                            $page.props.ehr_patient.patient.pid
                                        )
                                    "
                                    class="hover:text-teal-500 hover:underline"
                                >
                                    <span class="font-bold">
                                        {{
                                            $page.props.ehr_patient.patient
                                                .first_name
                                        }}
                                        {{
                                            $page.props.ehr_patient.patient
                                                .last_name
                                        }}
                                        ({{
                                            $page.props.ehr_patient.patient.pid
                                        }})
                                    </span>
                                </inertia-link>
                            </div>
                            <div class="flex flex-row">
                                <span
                                    >{{
                                        $t("forms.date_of_birth")
                                    }}:&nbsp;</span
                                >
                                <span class="font-bold">{{
                                    $page.props.ehr_patient.patient
                                        .date_of_birth
                                }}</span>
                                &nbsp;&nbsp;
                                <span>{{ $t("forms.age") }}:&nbsp;</span>
                                <span class="font-bold">{{
                                    $page.props.ehr_patient.patient.age
                                }}</span>
                            </div>
                        </div>
                        <inertia-link
                            :href="
                                route(
                                    'dashboard.patients.clear',
                                    $page.props.ehr_patient.patient.pid
                                )
                            "
                            class="mr-1.5 mb-1 ml-1.5 px-2 py-1 rounded-md text-xs font-small text-gray-300 hover:text-white inline-flex items-center bg-gray-700 font-bold hover:bg-gray-800 focus:outline-none focus:text-white focus:bg-gray-700 uppercase pointer"
                        >
                            Clear
                        </inertia-link>
                    </div>
                </div>
                <div class="flex flex-row justify-end">
                    <div
                        class="relative text-sm uppercase w-full sm:w-64"
                        style="font-size: 12px"
                    >
                        <div
                            v-if="$page.props.ehr_patient.patient === null"
                            class="mb-1"
                        >
                            <span>{{ $t("general.selected_encounter") }}:</span>
                            <span class="font-bold">None</span>
                        </div>
                        <div v-else class="mb-1">
                            <span>{{ $t("general.selected_encounter") }}:</span>
                            <span class="font-bold text-teal-300"
                                >2020-11-18</span
                            >
                            <select
                                class="appearance-none block w-full bg-transparent text-gray-400 border border-gray-500 rounded mt-1.5 py-1 px-4 mb-3 leading-tight text-xs focus:outline-none focus:bg-transparent focus:border-gray-500"
                            >
                                <option>Choose Encounter</option>
                                <option>New Encounter</option>
                                <option>Past Encounter List (3)</option>
                                <option>
                                    2020-11-02 / New Patient ----> Review
                                </option>
                                <option>
                                    2020-11-04 / Preventive Care Services ---->
                                    Review
                                </option>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center mt-3 px-2 text-gray-700"
                            >
                               <icon name="chevron-down" class="w-4 h-4" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

        </div>
    </nav>
</template>


<script>
import LanguageSwitcher from "../../components/LanguageSwitcher";

export default {
    name: "Header",
    watch: {
        "$page.props.ehr_patient": {
            handler() {
                if (this.$page.props.ehr_patient.patient) {
                    this.patient_id = this.$page.props.ehr_patient.patient.pid;
                } else {
                    this.patient_id = "#";
                }
            },
            deep: true,
        },
    },
    data() {
        return {
            patient_id: this.$page.props.ehr_patient.patient
                ? this.$page.props.ehr_patient.patient.pid
                : "#",
            open: false,
            isMenuOpen: false,
        };
    },
    components: {
        LanguageSwitcher,
    },
    methods: {
        url() {
            return location.pathname.substr(1);
        },
        isUrl(...urls) {
            if (urls[0] === "") {
                return this.url() === "";
            }
            return urls.filter((url) => this.url().startsWith(url)).length;
        },
        isActiveClass: function (url) {
            return this.isUrl(url)
                ? "mr-1 ml-1 px-2 py-2 rounded-md text-xs font-small text-gray-300 hover:text-white " +
                      "inline-flex items-center bg-theme-1 hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-theme-1" +
                      "transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-100 cursor-pointer"
                : "mr-1 ml-1 px-2 py-2 rounded-md text-xs font-small text-gray-300 hover:text-white " +
                      "inline-flex items-center bg-gray-800 hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 " +
                      "transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-100 cursor-pointer";
        },
        isSubMenuActive: function (url) {
            return this.isUrl(url)
                ? "block px-4 py-2 text-sm text-gray-700 bg-gray-100 hover:bg-gray-100"
                : "block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100";
        },
    },
};
</script>
<script setup>
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'

// initialize components based on data attribute selectors
onMounted(() => {
    initFlowbite();
});

</script>
