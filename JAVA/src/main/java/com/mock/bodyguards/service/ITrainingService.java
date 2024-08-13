package com.mock.bodyguards.service;

import com.mock.bodyguards.dto.training.BodyguardTrainingResponse;
import com.mock.bodyguards.entity.BodyguardTraining;
import com.mock.bodyguards.repository.BodyguardTrainingRepository;

import java.util.List;

public interface ITrainingService {

    /**
     * @param bodyguardId
     * @return
     */
    public List<BodyguardTraining> getOngoingTraining(Long bodyguardId);

    /**
     * @param bodyguardId
     * @return
     */
    public List<BodyguardTraining> getListTraining();
}
