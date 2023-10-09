<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Comment extends Component
{
    use WithPagination;

    public $company;
    public $user;
    public $name;
    public $commentText;
    public $rating;
    public $joinedAt;
    public $totalRating;
    public $votesCount;
    public $isVoted;
    public $isUserVoted;
    public $commentVotesCount;
    public $userHasVoted = [];
    public $successMessage;
    public $clearProperty;
    public $errorMessage;
    public $commentVotes = [];

    public function mount(Company $company, User $user)
    {
        $this->company = $company;
        $this->user = $user;
        $date = $user->created_at;
        $this->joinedAt = $date->format('F Y');
        $this->totalRating = number_format($this->company->comments->avg('rating'));

        $this->commentVotesCount = [];

        foreach ($this->company->comments as $comment) {
            $this->commentVotesCount[$comment->id] = $comment->votes->where('is_upvote', true)->count();

            if (Auth::check()) {
                $this->userHasVoted[$comment->id] = $comment->votes->where('is_upvote', true)->contains('user_id', Auth::user()->id);
            } else {
                $this->userHasVoted[$comment->id] = false;
            }
        }
    }

    public function addComment()
    {
        $this->validate([
            'commentText' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);
        try {
            \App\Models\Comment::create([
                'company_id' => $this->company->id,
                'name' => $this->company->name ?: Auth::user()->firstname . ' ' . Auth::user()->lastname,
                'comment_text' => $this->commentText,
                'rating' => $this->rating,
            ]);
            $this->totalRating = number_format($this->company->comments->avg('rating'), 1);
            $this->resetForm();
            $this->clearProperty = 'successMessage';
            $this->successMessage = 'Your comment has been posted successfully!';
        } catch (Exception $e) {
            $this->clearProperty = 'errorMessage';
            $this->errorMessage = 'There is an error, please try again later.';
        }
    }

    public function render()
    {
        $comments = $this->company->comments()->orderBy('created_at', 'desc')->paginate(3);
        return view('livewire.comment', compact('comments'));
    }

    public function toggleVote($commentId)
    {
        if (auth()->check()) {
            $comment = $this->company->comments()->find($commentId);

            if ($comment) {
                $user = auth()->user();

                $existingVote = $comment->votes()->where('user_id', $user->id)->first();

                if ($existingVote) {
                    $existingVote->is_upvote = !$existingVote->is_upvote;
                    $existingVote->save();
                    $this->commentVotesCount[$commentId] = $comment->votes->where('is_upvote', true)->count();
                    $this->userHasVoted[$commentId] = $existingVote->is_upvote;
                } else {
                    $comment->votes()->create([
                        'user_id' => $user->id,
                        'is_upvote' => true,
                    ]);
                    $this->commentVotesCount[$commentId] = $comment->votes->where('is_upvote', true)->count();
                    $this->userHasVoted[$commentId] = true;
                }

                $comment->refresh();
            }
        }
    }

    public function clearMessage($property)
    {
        $this->$property = null;
    }

    private function resetForm()
    {
        $this->name = '';
        $this->commentText = '';
        $this->rating = '';
    }

    public function votesCount()
    {
        return $this->company->comment->votes()->count();
    }

    public function paginationView()
    {
        return 'components/pagination';
    }
}
