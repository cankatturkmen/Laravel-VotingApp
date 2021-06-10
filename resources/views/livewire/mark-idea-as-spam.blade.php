<x-modal-confirm
    event-to-open-modal="custom-show-mark-idea-as-spam-modal"
    event-to-close-modal="ideaWasMarkedAsSpam"
    modal-title="Mark As Spam"
    modal-description="Are you sure you want to mark as spam this idea? This action cannot be undone."
    modal-confirm-button-text="Mark As Spam"
    wire-click="markAsSpam"
/>
{{-- <x-modal-confirm
    event-to-open-modal='custom-show-delete-modal'
    event-to-close-modal="ideaWasDeleted"
    modal-title="Delete Idea"
    modal-description="Are you sure you want to delete this idea? This action cannot be undone."
    modal-confirm-button-text="Delete"
    wire-click="deleteIdea"
/> --}}
