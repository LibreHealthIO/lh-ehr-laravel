<template>
    <div>
        <div class="p-10">
            <article class="prose">
                <h2>About LibreHealth EHR</h2>

                <p>
                    LibreHealth EHR is a free and open-source electronic health records and medical practice management application.

                    The mission of LibreHealth is to help provide high quality medical care to all people, regardless of race, socioeconomic status, or geographic location, by providing medical practices and clinics across the globe access to free of charge medical software. That same software is designed to save clinics both time and money, which gives practitioners more time to spend with individual patients, thereby supplying patients with higher quality care.

                    We are current and former contributors to OpenEMR and thank that community for years of hard work. We intend to honor that legacy by allowing this new community to leverage the good things in OpenEMR, share what we create and not be afraid to break backward compatibility in the name of forward progress and modern development models.

                    We are collaborating closely with the LibreHealth Project, an umbrella organization for health IT projects with similar goals.

                </p>

            </article>
        </div>
        <button type="submit" class="flex text-base text-white justify-center items-center ml-10 mr-10 px-10 py-3 rounded-md bg-gray-900 mb-3">
            <icon name="document-report" class="mx-2 h-5 w-5 text-white"/>
            {{ $t('forms.docs') }}
        </button>
    </div>
</template>

<script>
    import StaticPageLayout from "../layouts/StaticPageLayout"

    export default {
        name: 'About',
        layout: StaticPageLayout
    }
</script>
