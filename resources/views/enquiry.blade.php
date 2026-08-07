<style>
    :root {
        --bg-color: #f8fafc;
        --card-bg: #ffffff;
        --text-color: #1e293b;
        --text-muted: #64748b;
        --border-color: #cbd5e1;
        --primary-color: #3b82f6;
        --primary-hover: #2563eb;
        --success-bg: #f0fdf4;
        --success-color: #15803d;
        --success-border: #bbf7d0;
        --error-bg: #fef2f2;
        --error-color: #b91c1c;
        --error-border: #fecaca;
    }

    .enquiry-container {
        width: 100%;
        max-width: 600px;
        background: var(--card-bg);
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 2.5rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1);
        margin: 2rem auto;
        font-family: 'Inter', sans-serif;
        color: var(--text-color);
    }

    .enquiry-header {
        margin-bottom: 2rem;
        text-align: center;
    }

    .enquiry-header h1 {
        font-size: 1.8rem;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 0.5rem;
    }

    .enquiry-header p {
        color: var(--text-muted);
        font-size: 0.95rem;
    }

    /* Alert notifications */
    .alert {
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        font-size: 0.9rem;
        font-weight: 500;
        border: 1px solid transparent;
    }

    .alert-success {
        background-color: var(--success-bg);
        color: var(--success-color);
        border-color: var(--success-border);
    }

    .alert-error {
        background-color: var(--error-bg);
        color: var(--error-color);
        border-color: var(--error-border);
    }

    /* Form Layout */
    .form-group {
        margin-bottom: 1.25rem;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        font-family: inherit;
        font-size: 0.95rem;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        background-color: #ffffff;
        color: var(--text-color);
        outline: none;
        transition: border-color 0.2s, box-shadow 0.2s;
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
    }

    .form-control::placeholder {
        color: #94a3b8;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 120px;
    }

    .error-message {
        color: var(--error-color);
        font-size: 0.8rem;
        margin-top: 0.35rem;
        font-weight: 500;
    }

    /* Submit Button */
    .btn-submit {
        width: 100%;
        padding: 0.85rem 1.5rem;
        background-color: var(--primary-color);
        color: #ffffff;
        border: none;
        border-radius: 8px;
        font-family: inherit;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.2s;
        margin-top: 1rem;
    }

    .btn-submit:hover {
        background-color: var(--primary-hover);
    }

    .btn-submit:active {
        background-color: #1d4ed8;
    }
</style>

<div class="enquiry-container">
    <div class="enquiry-header">
        <h1>Submit an Enquiry</h1>
        <p>Please fill out the form below and we will get back to you shortly.</p>
    </div>

    <!-- Success Alert -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Error Alert -->
    @if($errors->any())
        <div class="alert alert-error">
            Please correct the errors in the form below.
        </div>
    @endif

    <form action="{{ route('enquiry.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Full Name" value="{{ old('name') }}" maxlength="255" required>
            @error('name')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email Address" value="{{ old('email') }}" maxlength="255" required>
            @error('email')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{ old('phone') }}" maxlength="15" required>
            @error('phone')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <input type="text" name="subject" class="form-control" placeholder="Subject" value="{{ old('subject') }}" maxlength="255" required>
            @error('subject')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <textarea name="message" class="form-control" placeholder="Message" required>{{ old('message') }}</textarea>
            @error('message')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn-submit">Submit</button>
    </form>
</div>
