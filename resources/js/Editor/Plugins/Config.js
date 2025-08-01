import Header from "@editorjs/header";
import Paragraph from "@editorjs/paragraph";
import Quote from "@editorjs/quote";
import EditorjsList from "@editorjs/list";
import ImageTool from "@editorjs/image";

export const header = {
    class: Header,
    inlineToolbar: true,
    levels: [1, 2, 3, 4, 5, 6],
    defaultLevel: 2
}

export const paragraph = {
    class: Paragraph,
    inlineToolbar: true
}

export const quote = {
    class: Quote,
    inlineToolbar: true,
    config: {
        quotePlaceholder: "Enter a quote",
        captionPlaceholder: "Quote's author"
    }
}

export const list = {
    class: EditorjsList,
    inlineToolbar: true,
    config: {
        defaultStyle: 'unordered'
    }
}

export const image = {
    class: ImageTool,
    config: {
        endpoints: {
            byFile: "/api/upload/image"
        }
    }
}
