<div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="edit-review-modal" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Edit Review</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
        <form class="form-horizontal" role="modal">
            <div class="form-group">
                <textarea type="name" class="form-control" rows="5" name="content" id="content-edit-review-modal"></textarea>
            </div>
        </form>
        <form class="form-horizontal" role="modal">
            <div class="form-group edit-vote-star-rating">
                <input type="hidden" name="rating-value" class="rating-value">
                <div class="rating pt-3 px-3">
                    <input class="rate" type="radio" name="rate" id="editstar5" value="5"><label for="editstar5"></label>
                    <input class="rate" type="radio" name="rate" id="editstar4.5" value="4.5"><label for="editstar4.5" class="half"></label>
                    <input class="rate" type="radio" name="rate" id="editstar4" value="4"><label for="editstar4"></label>
                    <input class="rate" type="radio" name="rate" id="editstar3.5" value="3.5"><label for="editstar3.5" class="half"></label>
                    <input class="rate" type="radio" name="rate" id="editstar3" value="3"><label for="editstar3"></label>
                    <input class="rate" type="radio" name="rate" id="editstar2.5" value="2.5"><label for="editstar2.5" class="half"></label>
                    <input class="rate" type="radio" name="rate" id="editstar2" value="2"><label for="editstar2"></label>
                    <input class="rate" type="radio" name="rate" id="editstar1.5" value="1.5"><label for="editstar1.5" class="half"></label>
                    <input class="rate" type="radio" name="rate" id="editstar1" value="1"><label for="editstar1"></label>
                    <input class="rate" type="radio" name="rate" id="editstar0.5" value="0.5"><label for="editstar0.5" class="half"></label>
                </div>
            </div>
            </form>
        <div class="modal-footer pb-0">
            <button type="button" class="btn btn-edit-review mx-3" data-dismiss="modal" data-url="{{ route('review.update', $review->id) }}">Edit</button>
            <button type="button" class="btn btn-return" data-dismiss="modal">Close</button>
        </div>
</div>
