export function localized_url(path = '/') {
    // Get the current language code from the <html lang="xx"> tag
    const lang = document.documentElement.lang || 'uk'; // fallback if undefined

    // Ensure path starts with a single slash and has no double slashes
    path = '/' + path.replace(/^\/+/, '');

    return `/${lang}${path}`;
}