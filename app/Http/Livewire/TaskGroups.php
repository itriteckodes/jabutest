<?php
 
namespace App\Http\Livewire;
 
use App\Models\Post;
use App\Models\TaskGroup;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
 
class TaskGroups extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
 
    protected function getTableQuery(): Builder
    {
        return TaskGroup::query();
    }
 
    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')->sortable()->searchable(),
            TextColumn::make('description')->sortable()->searchable()
        ];
    }
 
    protected function getTableEmptyStateIcon(): ?string 
    {
        return 'heroicon-o-bookmark';
    }
 
    protected function getTableEmptyStateHeading(): ?string
    {
        return 'No task groups yet';
    }
 
    protected function getTableEmptyStateDescription(): ?string
    {
        return 'You may create a post using the button below.';
    }
 
    protected function getTableEmptyStateActions(): array
    {
        return [
          
        ];
    } 
 
    public function render(): View
    {
        return view('livewire.task-group.task-groups');
    }
}