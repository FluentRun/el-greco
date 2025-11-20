<?php
/* Template Name: Contact Us */

$webhook_url = get_option('raphael_webhook_url');

get_header();
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow p-4 p-md-5">
                <h1 class="mb-4 fw-bold">Submit a Ticket</h1>

                <div id="formAlert"></div>

                <form id="ticketForm" class="row g-4">

                    <div class="col-12">
                        <label class="form-label fw-semibold">Ticket Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold">Ticket Content <span class="text-danger">*</span></label>
                        <textarea name="content" rows="5" class="form-control" required></textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Customer First Name</label>
                        <input type="text" name="sender[first_name]" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Customer Email <span class="text-danger">*</span></label>
                        <input type="email" name="sender[email]" class="form-control" required>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-dark w-100 py-3 fw-semibold" id="submitBtn">
                            Submit Ticket
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
const WEBHOOK_URL = "<?php echo esc_url( $webhook_url ); ?>";

document.getElementById("ticketForm").addEventListener("submit", async function(e) {
    e.preventDefault();

    const btn = document.getElementById("submitBtn");
    const alertBox = document.getElementById("formAlert");
    btn.disabled = true;
    btn.textContent = "Submitting...";

    const form = e.target;

    const payload = {
        title: form.title.value,
        content: form.content.value,
        sender: {
            first_name: form["sender[first_name]"].value,
            email: form["sender[email]"].value
        }
    };

    try {
        const res = await fetch(WEBHOOK_URL, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(payload)
        });

        if (res.ok) {
            alertBox.innerHTML = `<div class="alert alert-success">Your ticket has been created successfully.</div>`;
            form.reset();
        } else {
            throw new Error();
        }
    } catch (err) {
        alertBox.innerHTML = `<div class="alert alert-danger">Something went wrong. Please try again.</div>`;
    }

    btn.disabled = false;
    btn.textContent = "Submit Ticket";
});
</script>

<?php get_footer(); ?>
