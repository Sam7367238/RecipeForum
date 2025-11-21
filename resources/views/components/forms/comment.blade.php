@csrf

<div>
    <label for="comment">Comment</label>
    <input type="text" name="comment" value="{{ old('comment', $comment -> comment ?? '') }}">
</div>

<input type="submit" value="Save">