import IconifyIcon from '@/components/wrappers/IconifyIcon';
import SimplebarReactClient from '@/components/wrappers/SimplebarReactClient';
import { useKanbanContext } from '@/context/useKanbanContext';
import { DragDropContext, Draggable, Droppable } from '@hello-pangea/dnd';
import { Card, Dropdown, DropdownItem, DropdownMenu, DropdownToggle } from 'react-bootstrap';
import TaskItem from './TaskItem';
const Board = () => {
  const {
    onDragEnd,
    sections,
    getAllTasksPerSection
  } = useKanbanContext();
  return <div className="d-flex gap-3 kanban-board">
      <DragDropContext onDragEnd={onDragEnd}>
        {sections.map(section => <Droppable key={section.id} droppableId={section.id}>
            {provided => <div ref={provided.innerRef} {...provided.droppableProps} className="kanban-board-item" data-plugin="dragula" data-containers="[&quot;upcoming&quot;, &quot;in-progress&quot;, &quot;in-review&quot;, &quot;completed&quot;]">
                <div className="card">
                  <div className="card-body">
                    <Dropdown align={'end'} className="float-end">
                      <DropdownToggle as={'a'} className="drop-arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                        <IconifyIcon width={16} height={16} icon='ri:more-2-fill' className="m-0 text-muted h3" />
                      </DropdownToggle>
                      <DropdownMenu className="dropdown-menu-end">
                        <DropdownItem>Edit</DropdownItem>
                        <DropdownItem>Delete</DropdownItem>
                        <DropdownItem>Add Members</DropdownItem>
                        <DropdownItem>Add Due Date</DropdownItem>
                      </DropdownMenu>
                    </Dropdown>
                    <h4 className="mb-0">
                      {section.title}
                    </h4>
                  </div>
                  <SimplebarReactClient data-simplebar style={{
              maxHeight: 670
            }}>
                    <div className="tasklist px-3" id={section.id}>
                      {getAllTasksPerSection(section.id).map((task, idx) => <Draggable key={task.id} draggableId={task.id} index={idx}>
                          {provided => <Card ref={provided.innerRef} {...provided.draggableProps} {...provided.dragHandleProps}>
                              <TaskItem task={task} />
                            </Card>}
                        </Draggable>)}
                      {provided.placeholder}
                    </div>
                  </SimplebarReactClient>
                  <div className="card-body">
                    <button className="btn btn-primary w-100">
                      <IconifyIcon icon='ri:add-line' /> Add New
                    </button>
                  </div>
                </div>
              </div>}
          </Droppable>)}
      </DragDropContext>
    </div>;
};
export default Board;