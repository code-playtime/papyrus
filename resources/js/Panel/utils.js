export function makeSlug(text) {
    text = text.toLowerCase();
    text = text.replaceAll(" ", "-");

    return text;
}
