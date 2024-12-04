function formatText(command) {
    document.execCommand(command, false, null);
}

function insertList(type) {
    if (type === 'unordered') {
        document.execCommand('insertUnorderedList', false, null);
    } else if (type === 'ordered') {
        document.execCommand('insertOrderedList', false, null);
    }
}
