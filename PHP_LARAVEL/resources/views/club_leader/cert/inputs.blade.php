<div class="row">
    <div class="col-md-4">
        <div class="mb-3">
            <label for="event_id" class="form-label">Event</label>
            <select name="event_id" id="event_id" class="form-control" onchange="redirectToEvent(this.value)">
                <option value="">-- Select Event --</option>
                @foreach($events as $id => $name)
                    <option value="{{ $id }}" {{ request('event_id') == $id ? 'selected' : '' }}>
                        {{ $name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="student_id" class="form-label">Student</label>
            <select name="student_id" id="student_id" class="form-control">
                <option value="">-- Select Student --</option>
                @foreach($students as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="issue_date" class="form-label">Date</label>
            <input type="date" name="issue_date" id="issue_date" class="form-control">
        </div>
    </div>

    <div class="col-md-12 mt-2">
        <button type="submit" class="btn btn-success">
            Save <i class='bx bx-save'></i>
        </button>
    </div>
</div>
<script>
    function redirectToEvent(eventId) {
        const url = new URL(window.location.href);
        if (eventId) {
            url.searchParams.set('event_id', eventId);
        } else {
            url.searchParams.delete('event_id');
        }
        window.location.href = url.toString();
    }
</script>
