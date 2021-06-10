<x-modal-confirm
    event-to-open-modal="custom-show-mark-idea-as-not-spam-modal"
    event-to-close-modal='ideaWasMarkedAsNotSpam'
    modal-title='Mark As Not Spam'
    modal-description="This will decrease the spam report counter to 0. This action cannot undone."
    modal-confirm-button-text="Reset Spam Counter"
    wire-click="markAsNotSpam"
/>

