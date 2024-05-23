import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { useForm } from '@inertiajs/react';
import PrimaryButton from '@/Components/PrimaryButton';
import { Head } from '@inertiajs/react';

export default function ElectionDetails({ auth, election, candidates, acctovote }) {
    const { data, setData, post, processing, errors } = useForm({
        idElection: election.id,
        idCandidate: ''
    });

    const submitVote = () => {
        const isConfirmed = window.confirm("Are you sure you want to submit your vote?");
        
        if (isConfirmed) {
            post(route('election.vote')); 
        }
    };

    const handleVote = (candidateId) => {
        setData('idElection', data.id); 
        setData('idCandidate', candidateId);
    };

    return (
        <AuthenticatedLayout
            user={auth.user}
        >
            <Head title="Election" />
            <div className="py-10">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="overflow-hidden sm:rounded-lg flex flex-col justify-center items-center border-solid border-2 border-black">
                        <div className="bg-[#282D56] p-2  flex w-full justify-between">
                            <div>
                                {election.IsPublicResult || auth.user.role === "admin"?(
                                    <div className='font-bold flex flex-col text-white'>
                                        <div className="text-white">{election.Scope}</div>
                                        <div className="text-white">Pemilih Terdaftar: {election.TotalVoter}</div>
                                        <a href={route('election.result', {id:election.id})}>Lihat Hasil</a>
                                    </div>
                                ):(<div className='hidden'></div>)}
                            </div>
                            <div className='flex flex-col justify-center items-center'>
                                <div className="text-white text-4xl font-extrabold">{election.Title}</div>
                                <div className="text-white text-xl font-bold">{election.Description}</div>
                            </div>
                            <div className='flex '>
                                {auth.user.role === "admin" ?(
                                    <div className='font-bold flex flex-col text-white'>
                                        <a href={route('election.edit', {id:election.id})}>Edit Election</a>
                                        <a href={route('candidate.add', {id: election.id})}>Tambah Candidate</a>
                                    </div>
                                ):(<div className='hidden'></div>)}
                            </div>
                        </div>
                        <div className='min-h-[70vh] '>
                            <ul className='grid grid-cols-3 gap-3'>
                                {candidates.map((candidate) => (
                                    <li className='font-bold rounded-md p-2  bg-[#] m-2 bg-slate-300 min-h-[400px] flex flex-col gap-2 justify-between' key={candidate.id}>
                                        {candidate.Photo && (
                                            <div className='bg-slate-100 p-2 flex justify-center'>
                                                <img
                                                    src={`/storage/${candidate.Photo}`} 
                                                    alt={`${candidate.Chairman}`} 
                                                    className="w-[200px] h-[200px] object-cover" 
                                                />
                                            </div>
                                        )}
                                        <div className='bg-blue-50 min-h-[200px]'>
                                            <div>{candidate.SerialNumber}</div>
                                            <div>{candidate.Chairman}</div>
                                            <div>{candidate.DeputyChairman}</div>
                                            <div>{candidate.Vision}</div>
                                            <div>{candidate.Mision}</div>   
                                        </div>
                                        
                                        <div className='flex justify-center'>
                                            {(acctovote && auth.user.role === "voter") ?(
                                            <PrimaryButton
                                                onClick={() => {
                                                    handleVote(candidate.SerialNumber);
                                                }}
                                            >
                                                Vote
                                            </PrimaryButton>
                                            ):(<div className='hidden'></div>)}

                                            {auth.user.role === "admin" ?(
                                                <div className='mt-2'>
                                                <a className='bg-white p-1 rounded-md' href={route('candidate.edit', {id: candidate.id})}> EDIT Candidate</a>
                                                </div>
                                            ):(<div className='hidden'></div>)}
                                        </div>
                                    </li>
                                ))}
                            </ul>
                        </div>
                        <div className='flex mb-2'>
                            {(acctovote && auth.user.role === "voter") ?(
                                <PrimaryButton onClick={submitVote} disabled={processing}>
                                    Submit Vote
                                </PrimaryButton>
                            ):(<div className='hidden'></div>)}
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
