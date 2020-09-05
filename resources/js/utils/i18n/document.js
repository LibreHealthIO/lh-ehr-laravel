export function setDocumentDirectionPerLocale(locale) {
    let RTLs = ["ae", "he", "arc", "ha", "ur", "dv", "fa", "yi", "khw", "ks", "ku", "ps"];
    document.dir = RTLs.includes(locale) ? "rtl" : "ltr"
}

export function setDocumentLang(lang) {
  document.documentElement.lang = lang
}

export function setDocumentTitle(newTitle) {
    document.title = newTitle
}
