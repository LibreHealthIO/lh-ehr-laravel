import dayjs from "dayjs";

export default {
    install(Vue) {
        Vue.prototype.$h = {
            cutText(text, length) {
                if (text.split(" ").length > 1) {
                    let string = text.substring(0, length);
                    let splitText = string.split(" ");
                    splitText.pop();
                    return splitText.join(" ") + "...";
                } else {
                    return text;
                }
            },
            formatDate(date, format) {
                return dayjs(date).format(format);
            },
            notifyUser(message, title = 'error', type = "error",) {
                Vue.prototype.$notify(
                    {
                        group: "foo",
                        type: type,
                        title: title,
                        text: message ? message : 'Oops error',
                    }, 5000
                )
            },
            isset(obj) {
                if (obj !== null && obj !== undefined) {
                    if (typeof obj === "object" || Array.isArray(obj)) {
                        return Object.keys(obj).length;
                    } else {
                        return obj.toString().length;
                    }
                }

                return false;
            },
            assign(obj) {
                return JSON.parse(JSON.stringify(obj));
            },
            sleep(ms) {
                return new Promise(resolve => setTimeout(resolve, ms));
            },
            truncate(str, n) {
                return (str.length > n) ? str.substr(0, n - 1) + '...' : str
            },
            statusTemplate(status) {
                let bg = 'text-red-800 bg-red-100';
                if (status === 'pending') {
                    bg = 'text-yellow-800 bg-yellow-100'
                } else if (status === 'in-review') {
                    bg = 'text-blue-800 bg-blue-100'
                }
                return bg;
            },
        };
    }
};
