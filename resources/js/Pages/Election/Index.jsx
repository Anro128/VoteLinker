import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import PrimaryButton from '@/Components/PrimaryButton';
import { Head } from '@inertiajs/react';

export default function index({ auth, elections }) {
    const handleDelete = async (id) => {
        if (confirm('Apakah kamu yakin ingin menghapus election ini?')) {
            try {
                await axios.delete(`/election/delete/${id}`);
                alert('Election berhasil dihapus');
                window.location.reload();
            } catch (error) {
                console.error('error!', error);
                alert('Gagal menghapus election');
            }
        }
    };
    
    return (
        <AuthenticatedLayout
            user={auth.user}
        >
            <Head title="Election" />

            <div className="py-12 min-h-[85vh]">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="overflow-hidden sm:rounded-lg flex flex-col justify-center items-center">
                        <div className="p-6 text-gray-900 font-bold flex justify-center flex-col items-center text-2xl">
                            AVAILABLE ELECTION
                            <div>
                                {auth.user.role === "admin" ?(
                                    <a className='mt-2 bg-[#F08200] p-2 rounded-md text-sm hover:scale-110 transition-all' href={route('election.add')}>ADD ELECTION</a>
                                ):(<div className='hidden'></div>)}
                            </div>
                        </div>
                            
                        <div className='px-6 flex flex-col justify-center items-center w-full'>
                            <ul className='flex flex-col gap-4 w-full justify-center'>
                                {elections.map((election) => (
                                    <li key={election.id} className='bg-[#282D56] rounded-md p-2 flex flex-col max-h-[135px] text-white'>
                                        <li className='font-black text-xl'>{election.Title}</li>
                                        <li>{election.Description}</li>
                                        <a href={route('election.detail', {id:election.id})}
                                        className='mt-2 p-1 px-2 w-fit bg-[#F08200] rounded-md'>DETAIL</a>
                                        <button onClick={() => handleDelete(election.id)}
                                        className='mt-2 p-1 px-2 w-fit bg-[#E10000] rounded-md'>DELETE</button>
                                    </li>
                                ))}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </AuthenticatedLayout>
    );
}
