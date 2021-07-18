<script>
import cash from "cash-dom";

export default {
    name: "RolesPermissions",
    methods: {
        hasRole(role) {
            // check if user is null
            if (!this.$page.props.auth || !role) {
                return false;
            }
            let userRoles = this.$page.props.user_roles;
            let roles = role.split("|");
            for (let i = 0; i < roles.length; i++) {
                if (userRoles.includes(roles[i])) {
                    return true;
                }
            }
            return false;
        },
        role() {
          return this.$page.props.user_roles[0]
        },
        device_type() {
            return this.$page.props.device_type
        },
        can(permission) {
            // check if user is null
            if (!this.$page.props.auth || !permission) {
                return false;
            }
            let userPermissions = this.$page.props.user_permissions;
            let permissions = permission.split("|");
            for (let i = 0; i < permissions.length; i++) {
                if (userPermissions.includes(permissions[i])) {
                    return true;
                }
            }
            return false;
        },
        async showCancelModal( url, payload, description) {
            await this.$store.dispatch('SET_REPORT_MODAL', {
                url: url,
                payload: payload,
                description: description
            })
            cash('#cancelModal').modal('show')
        },
    }
}
</script>
