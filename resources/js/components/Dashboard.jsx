import * as Tabs from "@radix-ui/react-tabs";
import PostsTable from "./PostsTable";

export default function Dashboard(){

return(

<div className="p-8">

<h1 className="text-2xl font-bold mb-6">
Admin Dashboard
</h1>

<Tabs.Root defaultValue="posts">

<Tabs.List className="flex gap-4 border-b mb-6">

<Tabs.Trigger value="posts">Posts</Tabs.Trigger>

<Tabs.Trigger value="users">Users</Tabs.Trigger>

<Tabs.Trigger value="settings">Settings</Tabs.Trigger>

</Tabs.List>

<Tabs.Content value="posts">
<PostsTable/>
</Tabs.Content>

<Tabs.Content value="users">
Users Management
</Tabs.Content>

<Tabs.Content value="settings">
System Settings
</Tabs.Content>

</Tabs.Root>

</div>

);

}